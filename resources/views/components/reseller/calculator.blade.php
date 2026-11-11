@props(['prices' => []])
@php
    $labels = ['Instagram' => 'Instagram', 'TikTok' => 'TikTok', 'YouTube' => 'YouTube', 'Facebook' => 'Facebook', 'Twitter' => 'Twitter / X', 'Twitch' => 'Twitch', 'Website' => 'Website Traffic'];
    $platforms = [];
    foreach ($labels as $key => $label) {
        if (isset($prices[$key]) && (float) $prices[$key] > 0) {
            $platforms[] = ['key' => $key, 'label' => $label, 'cost' => (float) $prices[$key]];
        }
    }
@endphp
@if (count($platforms))
<section id="kalkulator" class="tw-w-full tw-py-20 tw-px-6 lg:tw-px-12 tw-relative tw-overflow-hidden tw-bg-gray-50/80" data-aos="fade-up">
    <!-- Background Elements -->
    <div class="tw-absolute tw-inset-0 tw-bg-grid tw-bg-[size:40px_40px] tw-opacity-30 tw-z-0"></div>
    <div class="tw-absolute tw-top-40 -tw-right-20 tw-w-60 tw-h-60 tw-bg-primary-100 tw-rounded-full tw-filter tw-blur-[100px] tw-opacity-50 tw-animate-float"></div>

    <div class="tw-max-w-7xl tw-mx-auto tw-relative tw-z-10"
        x-data="{
            platforms: @js($platforms),
            selected: 0,
            sell: 0,
            qty: 1000,
            orders: 100,
            init() { this.resetSell(); },
            get cost() { return this.platforms[this.selected].cost; },
            resetSell() { this.sell = Math.max(100, Math.ceil(this.cost * 3 / 100) * 100); },
            get k() { return Math.max(0, Number(this.qty) || 0) / 1000; },
            get costPerOrder() { return this.cost * this.k; },
            get sellPerOrder() { return (Number(this.sell) || 0) * this.k; },
            get profitPerOrder() { return this.sellPerOrder - this.costPerOrder; },
            get profitPerMonth() { return this.profitPerOrder * Math.max(0, Number(this.orders) || 0); },
            get margin() { return this.sellPerOrder > 0 ? Math.round(this.profitPerOrder / this.sellPerOrder * 100) : 0; },
            rp(n) { return 'Rp ' + Math.round(n).toLocaleString('id-ID'); },
            rpUnit(n) { return 'Rp ' + Number(n).toLocaleString('id-ID', { maximumFractionDigits: 2 }); }
        }">
        <div class="tw-flex tw-flex-col tw-items-center tw-mb-14" data-aos="fade-up">
            <div class="tw-bg-primary tw-bg-opacity-10 tw-backdrop-blur-sm tw-rounded-full tw-px-4 tw-py-1.5 tw-flex tw-items-center tw-justify-center tw-mb-4 tw-border tw-border-primary-200">
                <span class="tw-text-primary tw-font-semibold tw-text-sm">Kalkulator Margin</span>
            </div>
            <h2 class="tw-text-3xl md:tw-text-4xl tw-font-bold tw-text-center tw-text-gray-900 tw-mb-4">
                Berapa <span class="text-gradient">Untung</span> yang Bisa Anda Dapat?
            </h2>
            <p class="tw-text-lg tw-text-gray-600 tw-text-center tw-max-w-2xl">
                Pilih platform, tentukan harga jual Anda, dan lihat estimasi keuntungan per bulan.
            </p>
        </div>

        <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-2 tw-gap-6" data-aos="fade-up" data-aos-delay="100">
            <!-- Input -->
            <div class="tw-bg-white tw-p-6 sm:tw-p-8 tw-rounded-xl tw-shadow-sm hover:tw-shadow-glow-primary tw-border tw-border-primary-100 hover:tw-border-primary-200 tw-transition-all tw-duration-300 tw-space-y-5">
                <div>
                    <label for="calc-platform" class="tw-block tw-text-sm tw-font-semibold tw-text-gray-800 tw-mb-2">Platform</label>
                    <select id="calc-platform" x-model.number="selected" @change="resetSell()" class="tw-w-full tw-rounded-lg tw-border tw-border-primary-200 tw-bg-white tw-px-4 tw-py-2.5 tw-text-gray-800 focus:tw-border-primary focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-primary-200">
                        <template x-for="(p, i) in platforms" :key="p.key">
                            <option :value="i" x-text="p.label"></option>
                        </template>
                    </select>
                    <p class="tw-mt-2 tw-text-sm tw-text-gray-500">
                        Harga modal mulai <span class="tw-font-semibold tw-text-primary" x-text="rpUnit(cost)"></span> / 1.000
                    </p>
                </div>
                <div>
                    <label for="calc-sell" class="tw-block tw-text-sm tw-font-semibold tw-text-gray-800 tw-mb-2">Harga jual Anda (per 1.000)</label>
                    <input id="calc-sell" type="number" min="0" step="100" x-model.number="sell" class="tw-w-full tw-rounded-lg tw-border tw-border-primary-200 tw-px-4 tw-py-2.5 tw-text-gray-800 focus:tw-border-primary focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-primary-200">
                </div>
                <div class="tw-grid tw-grid-cols-2 tw-gap-4">
                    <div>
                        <label for="calc-qty" class="tw-block tw-text-sm tw-font-semibold tw-text-gray-800 tw-mb-2">Jumlah per order</label>
                        <input id="calc-qty" type="number" min="0" step="100" x-model.number="qty" class="tw-w-full tw-rounded-lg tw-border tw-border-primary-200 tw-px-4 tw-py-2.5 tw-text-gray-800 focus:tw-border-primary focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-primary-200">
                    </div>
                    <div>
                        <label for="calc-orders" class="tw-block tw-text-sm tw-font-semibold tw-text-gray-800 tw-mb-2">Order per bulan</label>
                        <input id="calc-orders" type="number" min="0" step="10" x-model.number="orders" class="tw-w-full tw-rounded-lg tw-border tw-border-primary-200 tw-px-4 tw-py-2.5 tw-text-gray-800 focus:tw-border-primary focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-primary-200">
                    </div>
                </div>
            </div>

            <!-- Hasil -->
            <div class="tw-relative tw-group">
                <div class="tw-absolute tw-inset-0 tw-bg-primary-300 tw-rounded-xl tw-blur-[40px] tw-opacity-20 group-hover:tw-opacity-40 tw-z-0 tw-transition-opacity"></div>
                <div class="tw-relative tw-z-10 tw-h-full tw-bg-white tw-p-6 sm:tw-p-8 tw-rounded-xl tw-shadow-lg tw-border tw-border-primary-200 tw-flex tw-flex-col">
                    <div class="tw-space-y-3 tw-text-gray-600">
                        <div class="tw-flex tw-justify-between"><span>Modal per order</span><span class="tw-font-semibold tw-text-gray-800" x-text="rp(costPerOrder)"></span></div>
                        <div class="tw-flex tw-justify-between"><span>Harga jual per order</span><span class="tw-font-semibold tw-text-gray-800" x-text="rp(sellPerOrder)"></span></div>
                        <div class="tw-flex tw-justify-between tw-border-t tw-border-primary-100 tw-pt-3"><span>Untung per order</span><span class="tw-font-semibold tw-text-primary" x-text="rp(profitPerOrder)"></span></div>
                        <div class="tw-flex tw-justify-between"><span>Margin</span><span class="tw-font-semibold tw-text-primary" x-text="margin + '%'"></span></div>
                    </div>
                    <div class="tw-mt-6 tw-rounded-xl tw-bg-primary-50 tw-border tw-border-primary-100 tw-p-5 tw-text-center">
                        <p class="tw-text-sm tw-text-gray-600 tw-mb-1">Estimasi untung per bulan</p>
                        <p class="tw-text-3xl sm:tw-text-4xl tw-font-bold text-gradient" x-text="rp(profitPerMonth)"></p>
                    </div>
                    <button class="btn-primary btn-glow tw-mt-6 tw-w-full tw-flex tw-items-center tw-justify-center" onclick="window.location.href='{{ route('register') }}'">
                        <span>Mulai Jualan Sekarang</span>
                        <x-icons.arrow-right class="tw-w-4 tw-h-4 tw-ml-2" />
                    </button>
                    <p class="tw-mt-4 tw-text-xs tw-text-gray-500 tw-leading-relaxed">
                        *Hanya estimasi. Harga modal adalah harga layanan termurah di tiap platform saat ini dan bisa berubah. Kualitas dan harga tiap layanan berbeda, cek daftar layanan sebelum menentukan harga jual.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
