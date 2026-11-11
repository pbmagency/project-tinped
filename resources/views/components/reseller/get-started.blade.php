@props(['prices' => []])
<section class="tw-relative tw-w-full tw-overflow-hidden tw-px-6 tw-py-20 lg:tw-px-12" data-aos="fade-up" data-aos-duration="800">
    <!-- Background Elements -->
    <div class="tw-absolute -tw-left-20 tw-top-40 tw-h-60 tw-w-60 tw-animate-float tw-rounded-full tw-bg-primary-100 tw-opacity-50 tw-blur-[100px] tw-filter"></div>
    <div class="tw-absolute tw-bottom-40 -tw-right-20 tw-w-60 tw-h-60 tw-bg-primary-100 tw-rounded-full tw-filter tw-blur-[100px] tw-opacity-40 tw-animate-float" style="animation-delay: 0.5s;"></div>

    <div class="tw-relative tw-z-10 tw-mx-auto tw-max-w-7xl">
        <div class="tw-mb-14 tw-flex tw-flex-col tw-items-center" data-aos="fade-up">
            <div class="tw-mb-4 tw-flex tw-items-center tw-justify-center tw-rounded-full tw-border tw-border-primary-200 tw-bg-primary tw-bg-opacity-10 tw-px-4 tw-py-1.5 tw-backdrop-blur-sm">
                <span class="tw-text-sm tw-font-semibold tw-text-primary">Get Started</span>
            </div>
            <h2 class="tw-mb-4 tw-text-center tw-text-3xl tw-font-bold tw-text-gray-900 md:tw-text-4xl">
                Mulai Jualan dalam <span class="text-gradient">4 Langkah</span>
            </h2>
            <p class="tw-max-w-2xl tw-text-center tw-text-lg tw-text-gray-600">
                Tanpa biaya pendaftaran, tanpa stok, tanpa minimal order bulanan.
            </p>
        </div>

        <!-- Steps -->
        <div class="tw-mb-16 tw-grid tw-grid-cols-1 tw-gap-6 sm:tw-grid-cols-2 lg:tw-grid-cols-4">
            @php
                $stepData = [
                    [
                        'id' => 1,
                        'title' => 'Daftar Gratis',
                        'icon' => 'user-plus',
                        'description' => 'Buat akun dalam kurang dari 1 menit dengan email atau Google.',
                    ],
                    [
                        'id' => 2,
                        'title' => 'Isi Saldo',
                        'icon' => 'wallet',
                        'description' => 'Top up saldo lewat QRIS, e-wallet, transfer bank, atau minimarket.',
                    ],
                    [
                        'id' => 3,
                        'title' => 'Pasang Harga Jual',
                        'icon' => 'list-checks',
                        'description' => 'Cek harga modal di daftar layanan, lalu tentukan harga jual di toko atau katalog Anda.',
                    ],
                    [
                        'id' => 4,
                        'title' => 'Teruskan Order',
                        'icon' => 'package-2',
                        'description' => 'Ada pesanan masuk? Input link dan jumlahnya di TINPED, lalu pantau statusnya dari riwayat pesanan.',
                    ],
                ];
            @endphp

            @foreach ($stepData as $step)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <x-step-card :step="$step" />
                </div>
            @endforeach
        </div>

        <!-- Price List -->
        <div class="tw-mb-16" data-aos="fade-up" data-aos-delay="100">
            <h3 class="tw-text-xl md:tw-text-2xl tw-font-semibold tw-text-center tw-text-gray-900 tw-mb-2">
                Harga Modal <span class="text-gradient">Mulai Dari</span>
            </h3>
            <p class="tw-text-center tw-text-gray-600 tw-mb-6">Harga per 1.000, diperbarui otomatis dari sistem.</p>
            <div class="tw-relative tw-w-full tw-overflow-hidden">
                <div class="tw-flex tw-gap-6 tw-py-4 tw-animate-carouselPrice">
                    @php
                        $services = [
                            ['id' => 1, 'name' => 'Instagram', 'icon' => 'instagram', 'key' => 'Instagram'],
                            ['id' => 2, 'name' => 'Tiktok', 'icon' => 'tiktok', 'key' => 'TikTok'],
                            ['id' => 3, 'name' => 'YouTube', 'icon' => 'youtube', 'key' => 'YouTube'],
                            ['id' => 4, 'name' => 'Facebook', 'icon' => 'facebook', 'key' => 'Facebook'],
                            ['id' => 5, 'name' => 'Twitter', 'icon' => 'twitter', 'key' => 'Twitter'],
                            ['id' => 6, 'name' => 'Twitch', 'icon' => 'twitch', 'key' => 'Twitch'],
                            ['id' => 7, 'name' => 'Website', 'icon' => 'globe', 'key' => 'Website'],
                        ];
                        // Hanya tampilkan platform yang punya harga
                        $services = array_values(array_filter($services, fn ($s) => isset($prices[$s['key']])));
                        foreach ($services as &$s) {
                            $p = (float) $prices[$s['key']];
                            // Pertahankan desimal untuk harga kecil (mis. Rp 0,5) agar tidak tampil Rp 0
                            $s['startingPrice'] = 'Rp. ' . ($p < 100 ? rtrim(rtrim(number_format($p, 2, ',', '.'), '0'), ',') : number_format($p, 0, ',', '.'));
                        }
                        unset($s);
                        $allServices = array_merge($services, $services);
                    @endphp
                    @foreach ($allServices as $index => $service)
                        <div>
                            <x-price-card :service="$service" :key="$service['id'] . '-' . $index" />
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tw-mt-6 tw-flex tw-justify-center">
                <button class="btn-outline tw-text-sm sm:tw-text-base tw-flex tw-items-center tw-justify-center" onclick="window.location.href='{{ route('home.list.layanan') }}'">
                    Lihat Semua Harga Layanan
                </button>
            </div>
        </div>

        <!-- Video Tutorial (thumbnail dulu, iframe dimuat saat diklik) -->
        <div class="tw-mt-6 tw-flex tw-w-full tw-items-center tw-justify-center" data-aos="fade-up" data-aos-delay="200">
            <div class="tw-w-full tw-max-w-4xl tw-overflow-hidden tw-rounded-xl tw-border tw-border-primary-200 tw-shadow-sm" x-data="{ play: false }">
                <div class="tw-relative tw-aspect-video tw-w-full tw-bg-gray-900">
                    <template x-if="!play">
                        <button type="button" class="tw-group tw-absolute tw-inset-0 tw-h-full tw-w-full" @click="play = true" aria-label="Putar video tutorial TINPED SMM">
                            <img src="https://i.ytimg.com/vi/L0RSC-aVCVA/hqdefault.jpg" alt="Video tutorial TINPED SMM" loading="lazy" class="tw-h-full tw-w-full tw-object-cover tw-opacity-90 group-hover:tw-opacity-100 tw-transition-opacity">
                            <span class="tw-absolute tw-inset-0 tw-flex tw-items-center tw-justify-center">
                                <span class="tw-flex tw-h-16 tw-w-16 tw-items-center tw-justify-center tw-rounded-full tw-bg-primary tw-shadow-glow-primary-lg tw-animate-pulse-glow">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="tw-ml-1 tw-h-7 tw-w-7 tw-text-white" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="6 4 20 12 6 20 6 4"></polygon></svg>
                                </span>
                            </span>
                        </button>
                    </template>
                    <template x-if="play">
                        <iframe class="tw-absolute tw-inset-0 tw-h-full tw-w-full"
                            src="https://www.youtube.com/embed/L0RSC-aVCVA?autoplay=1" title="TINPED SMM Tutorial"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </template>
                </div>
            </div>
        </div>
    </div>
</section>
