<?php

namespace App\Http\Controllers;

use App\Models\Smm;
use App\Models\User;
use App\Models\History;
use App\Models\HistoryOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class ResellerController extends Controller
{
    /** Nama cookie & nilai yang dipakai untuk menandai sumber pendaftar. */
    public const SOURCE_COOKIE = 'reg_source';
    public const SOURCE_VALUE = 'reseller';

    public function index()
    {
        // Tandai pengunjung LP ini selama 30 hari, dibaca saat registrasi
        Cookie::queue(self::SOURCE_COOKIE, self::SOURCE_VALUE, 60 * 24 * 30);

        return view('landing.reseller', [
            'servicesPrices' => $this->platformPrices(),
            'stats' => $this->stats(),
        ]);
    }

    /**
     * Harga modal termurah per platform (per 1.000), hanya layanan aktif.
     * Key mengikuti kata pertama kategori, sama seperti LP utama.
     */
    private function platformPrices(): array
    {
        $allowed = ['facebook', 'instagram', 'tiktok', 'youtube', 'twitch', 'twitter', 'website'];

        $rows = Smm::where('status', 'aktif')
            ->select(DB::raw('SUBSTRING_INDEX(category, " ", 1) as first_word'), DB::raw('MIN(price) as min_price'))
            ->groupBy('first_word')
            ->get();

        $prices = [];
        foreach ($rows as $row) {
            if (in_array(strtolower($row->first_word), $allowed)) {
                $prices[$row->first_word] = $row->min_price;
            }
        }
        return $prices;
    }

    /** Angka social proof, diperbarui 24 jam sekali. */
    private function stats(): array
    {
        return Cache::remember('reseller_lp_stats', 60 * 60 * 24, function () {
            return [
                'users' => User::where('status', 'active')->count(),
                // Order member (bayar dari saldo) kecuali yang gagal, ditambah order tanpa login
                // yang sudah dibayar & diproses (status 'pending' bisa berarti belum dibayar).
                'orders' => History::where('status', '!=', 'error')->count()
                    + HistoryOrder::whereIn('status', ['processing', 'done', 'partial'])->count(),
                'services' => Smm::where('status', 'aktif')->count(),
            ];
        });
    }
}
