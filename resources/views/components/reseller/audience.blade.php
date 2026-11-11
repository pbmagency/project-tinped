<section class="tw-w-full tw-py-20 tw-px-6 lg:tw-px-12 tw-relative tw-overflow-hidden" data-aos="fade-up">
    <!-- Background Elements -->
    <div class="tw-absolute tw-top-40 -tw-left-20 tw-w-60 tw-h-60 tw-bg-primary-100 tw-rounded-full tw-filter tw-blur-[100px] tw-opacity-40 tw-animate-float"></div>

    <div class="tw-max-w-7xl tw-mx-auto tw-relative tw-z-10">
        <div class="tw-flex tw-flex-col tw-items-center tw-mb-14" data-aos="fade-up">
            <div class="tw-bg-primary tw-bg-opacity-10 tw-backdrop-blur-sm tw-rounded-full tw-px-4 tw-py-1.5 tw-flex tw-items-center tw-justify-center tw-mb-4 tw-border tw-border-primary-200">
                <span class="tw-text-primary tw-font-semibold tw-text-sm">Untuk Siapa?</span>
            </div>
            <h2 class="tw-text-3xl md:tw-text-4xl tw-font-bold tw-text-center tw-text-gray-900 tw-mb-4">
                Cocok untuk <span class="text-gradient">Penjual Jasa Sosmed</span>
            </h2>
            <p class="tw-text-lg tw-text-gray-600 tw-text-center tw-max-w-2xl">
                Anda yang pegang pelanggan, TINPED yang mengerjakan pesanannya.
            </p>
        </div>

        <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-3 tw-gap-6" data-aos="fade-up" data-aos-delay="100">
            @php
            $audiences = [
                [
                    'id' => 1,
                    'title' => 'Penjual di Marketplace',
                    'description' => 'Buka toko jasa sosmed di marketplace. Setiap pesanan pembeli tinggal Anda teruskan ke TINPED dan pantau statusnya.',
                    'icon' => 'package-2',
                ],
                [
                    'id' => 2,
                    'title' => 'Reseller via WhatsApp',
                    'description' => 'Terima order dari chat WhatsApp atau DM, proses dalam hitungan detik, lalu kabari pelanggan begitu pesanan berjalan.',
                    'icon' => 'zap',
                ],
                [
                    'id' => 3,
                    'title' => 'Agensi & Social Media Manager',
                    'description' => 'Kelola kebutuhan engagement banyak klien dari satu akun dan satu saldo, tanpa harus pindah-pindah panel.',
                    'icon' => 'list-checks',
                ],
            ];
            @endphp

            @foreach ($audiences as $feature)
                <x-feature-card :feature="$feature" />
            @endforeach
        </div>
    </div>
</section>
