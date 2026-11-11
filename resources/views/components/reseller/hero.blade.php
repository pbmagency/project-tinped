@props(['stats' => []])
@php
    // Bulatkan ke bawah supaya klaim selalu benar: 1.537 -> "1.500+", 87 -> "87"
    $fmt = function ($n) {
        $n = (int) $n;
        if ($n >= 1000) {
            return number_format(floor($n / 100) * 100, 0, ',', '.') . '+';
        }
        if ($n >= 100) {
            return number_format(floor($n / 10) * 10, 0, ',', '.') . '+';
        }
        return (string) $n;
    };
    $proof = array_filter([
        ['value' => $stats['users'] ?? 0, 'label' => 'User Aktif'],
        ['value' => $stats['orders'] ?? 0, 'label' => 'Pesanan Diproses'],
        ['value' => $stats['services'] ?? 0, 'label' => 'Layanan Tersedia'],
    ], fn ($item) => (int) $item['value'] >= 100); // angka < 100 disembunyikan agar tidak melemahkan kesan
    // Kelas literal agar terdeteksi Tailwind JIT
    $gridCols = [1 => 'tw-grid-cols-1', 2 => 'tw-grid-cols-2', 3 => 'tw-grid-cols-3'][count($proof)] ?? 'tw-grid-cols-3';
@endphp
<div class="tw-min-h-screen tw-relative tw-overflow-hidden tw-flex tw-flex-col tw-items-center tw-justify-center tw-px-4 sm:tw-px-6 lg:tw-px-12 tw-pt-16 sm:tw-pt-20 tw-pb-8 sm:tw-pb-10" data-aos="fade-up">
    <!-- Background Elements -->
    <div class="tw-absolute tw-inset-0 tw-bg-grid tw-bg-[size:24px_24px] sm:tw-bg-[size:32px_32px] tw-opacity-60 tw-z-0"></div>
    <div class="tw-absolute tw-top-20 tw-left-1/2 tw-transform -tw-translate-x-1/2 tw-w-[150%] sm:tw-w-[130%] tw-h-[150%] tw-bg-gradient-radial tw-from-primary-100/50 tw-to-transparent tw-opacity-70 tw-pointer-events-none"></div>
    <div class="tw-absolute tw-top-40 -tw-left-20 tw-w-32 sm:tw-w-40 tw-h-32 sm:tw-h-40 tw-bg-primary-200 tw-rounded-full tw-filter tw-blur-[60px] sm:tw-blur-[80px] tw-opacity-60 tw-animate-float"></div>
    <div class="tw-absolute tw-bottom-20 sm:tw-bottom-40 -tw-right-10 sm:-tw-right-20 tw-w-40 sm:tw-w-60 tw-h-40 sm:tw-h-60 tw-bg-primary-100 tw-rounded-full tw-filter tw-blur-[60px] sm:tw-blur-[80px] tw-opacity-30 tw-animate-float" style="animation-delay: 1s;"></div>

    <div class="tw-max-w-7xl tw-w-full tw-mx-auto tw-flex tw-flex-col tw-items-center tw-justify-center tw-relative tw-z-10 tw-pt-8 sm:tw-pt-12 md:tw-pt-16 tw-px-2 sm:tw-px-4">
        <!-- Brand Badge -->
        <div class="tw-bg-primary tw-bg-opacity-10 tw-backdrop-blur-sm tw-rounded-full tw-px-4 sm:tw-px-6 tw-py-1.5 sm:tw-py-2 tw-flex tw-items-center tw-justify-center tw-mb-4 sm:tw-mb-6 tw-border tw-border-primary-200 tw-animate-pulse-glow" data-aos="zoom-in" data-aos-delay="200">
            <span class="tw-text-primary tw-font-semibold tw-text-sm sm:tw-text-base">Program Reseller TINPED SMM</span>
        </div>

        <!-- Main Heading -->
        <h1 class="heading-animation tw-text-3xl sm:tw-text-4xl md:tw-text-5xl lg:tw-text-6xl tw-font-bold tw-text-center tw-mb-4 sm:tw-mb-6 tw-text-gray-900 tw-tracking-tight tw-px-2 sm:tw-px-4" data-aos="fade-up" data-aos-delay="300">
            <span class="tw-block tw-text-balance tw-max-w-[95vw] sm:tw-max-w-full">Jual Jasa Followers & Views</span>
            <span class="tw-block text-gradient tw-text-balance tw-mt-1 tw-max-w-[95vw] sm:tw-max-w-full">Untung di Setiap Order</span>
        </h1>

        <!-- Sub Heading -->
        <p class="subheading-animation tw-text-base sm:tw-text-lg md:tw-text-xl tw-text-gray-600 tw-text-center tw-max-w-[95vw] sm:tw-max-w-xl md:tw-max-w-2xl tw-mb-6 sm:tw-mb-8 tw-leading-relaxed tw-px-2 sm:tw-px-4" data-aos="fade-up" data-aos-delay="400">
            Ambil layanan dari TINPED, jual dengan harga Anda sendiri di marketplace atau WhatsApp. Pesanan diproses otomatis, Anda tinggal fokus jualan.
        </p>

        <!-- CTA Buttons -->
        <div class="buttons-animation tw-flex tw-flex-col sm:tw-flex-row tw-items-center tw-gap-3 sm:tw-gap-4 tw-mb-10 sm:tw-mb-12 tw-w-full tw-max-w-xs sm:tw-max-w-xl tw-justify-center" data-aos="fade-up" data-aos-delay="500">
            <button class="tw-w-full sm:tw-w-auto btn-primary tw-text-sm sm:tw-text-base tw-py-2.5 sm:tw-py-3 tw-px-6 sm:tw-px-8 btn-glow tw-flex tw-items-center tw-justify-center" onclick="window.location.href='{{ route('register') }}'">
                <span class="tw-whitespace-nowrap">Daftar Jadi Reseller</span>
                <x-icons.arrow-right class="tw-w-4 tw-h-4 tw-ml-2" />
            </button>
            <button class="tw-w-full sm:tw-w-auto btn-outline tw-text-sm sm:tw-text-base tw-py-2.5 sm:tw-py-3 tw-px-6 sm:tw-px-8 tw-flex tw-items-center tw-justify-center" onclick="document.getElementById('kalkulator').scrollIntoView({ behavior: 'smooth' })">
                <span class="tw-whitespace-nowrap">Hitung Untungnya</span>
            </button>
        </div>

        <!-- Social Proof (1 baris, data DB di-cache 24 jam) -->
        @if (count($proof))
            <div class="tw-w-full tw-max-w-3xl tw-mb-12 sm:tw-mb-16" data-aos="fade-up" data-aos-delay="550">
                <div class="glass-morphism tw-rounded-xl tw-border tw-border-primary-100 tw-grid {{ $gridCols }} tw-divide-x tw-divide-primary-100">
                    @foreach ($proof as $item)
                        <div class="tw-px-2 sm:tw-px-6 tw-py-4 tw-text-center">
                            <p class="tw-text-lg sm:tw-text-2xl md:tw-text-3xl tw-font-bold text-gradient">{{ $fmt($item['value']) }}</p>
                            <p class="tw-text-xs sm:tw-text-sm tw-text-gray-600">{{ $item['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Logo Carousel -->
        <div class="tw-w-full tw-overflow-hidden tw-px-2 sm:tw-px-0" data-aos="fade-up" data-aos-delay="600">
            <x-logo-carousel />
        </div>
    </div>
</div>
