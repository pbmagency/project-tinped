<section class="tw-w-full tw-py-20 tw-px-6 lg:tw-px-12 tw-relative tw-overflow-hidden tw-bg-gray-50/80">
    <!-- Background Elements -->
    <div class="tw-absolute tw-inset-0 tw-bg-grid tw-bg-[size:40px_40px] tw-opacity-30 tw-z-0"></div>
    <div class="tw-absolute tw-top-40 -tw-right-20 tw-w-60 tw-h-60 tw-bg-primary-100 tw-rounded-full tw-filter tw-blur-[100px] tw-opacity-50 tw-animate-float"></div>

    <div class="tw-max-w-7xl tw-mx-auto tw-relative tw-z-10">
        <div class="tw-flex tw-flex-col tw-items-center tw-mb-14" data-aos="fade-up">
            <div class="tw-bg-primary tw-bg-opacity-10 tw-backdrop-blur-sm tw-rounded-full tw-px-4 tw-py-1.5 tw-flex tw-items-center tw-justify-center tw-mb-4 tw-border tw-border-primary-200">
                <span class="tw-text-primary tw-font-semibold tw-text-sm">Features</span>
            </div>
            <h2 class="tw-text-3xl md:tw-text-4xl tw-font-bold tw-text-center tw-text-gray-900 tw-mb-4">
                Kenapa Reseller Memilih <span class="text-gradient">TINPED SMM?</span>
            </h2>
            <p class="tw-text-lg tw-text-gray-600 tw-text-center tw-max-w-2xl">
                Semua yang Anda butuhkan untuk menjalankan bisnis jasa sosmed ada di satu dashboard.
            </p>
        </div>

        <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 lg:tw-grid-cols-3 tw-gap-6" data-aos="fade-up" data-aos-delay="200">
            @php
            $features = [
                [
                    'id' => 1,
                    'title' => 'Proses Otomatis 24 Jam',
                    'description' => 'Pesanan langsung diproses sistem tanpa menunggu admin, termasuk saat Anda sedang tidur.',
                    'icon' => 'zap',
                ],
                [
                    'id' => 2,
                    'title' => 'Order Massal',
                    'description' => 'Banyak pesanan masuk sekaligus? Kirim semuanya dalam satu form order massal.',
                    'icon' => 'list-checks',
                ],
                [
                    'id' => 3,
                    'title' => 'Refill & Refund Otomatis',
                    'description' => 'Layanan bergaransi bisa di-refill dari riwayat pesanan. Pesanan yang gagal, saldonya kembali otomatis.',
                    'icon' => 'shield-check',
                ],
                [
                    'id' => 4,
                    'title' => 'Deposit Rupiah & QRIS',
                    'description' => 'Isi saldo lewat QRIS, e-wallet, transfer bank, atau minimarket. Saldo masuk otomatis.',
                    'icon' => 'wallet',
                ],
                [
                    'id' => 5,
                    'title' => 'Notifikasi WhatsApp',
                    'description' => 'Hubungkan bot WhatsApp untuk menerima notifikasi deposit dan balasan tiket langsung di HP Anda.',
                    'icon' => 'headset',
                ],
                [
                    'id' => 6,
                    'title' => 'API untuk Website & Bot',
                    'description' => 'Sudah punya website atau bot sendiri? Sambungkan lewat API agar pesanan berjalan tanpa input manual.',
                    'icon' => 'clock',
                ],
            ];
            @endphp

            @foreach ($features as $feature)
                <x-feature-card :feature="$feature" />
            @endforeach
        </div>

        <div class="tw-mt-10 tw-flex tw-justify-center" data-aos="fade-up">
            <a href="{{ route('dokumentasi') }}" class="link-underline tw-text-primary tw-font-medium">Lihat dokumentasi API</a>
        </div>
    </div>
</section>
