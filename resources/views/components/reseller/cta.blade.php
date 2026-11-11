<section class="tw-w-full tw-py-20 tw-px-6 lg:tw-px-12 tw-relative tw-overflow-hidden" data-aos="fade-up">
    <!-- Background Elements -->
    <div class="tw-absolute tw-inset-0 tw-bg-grid tw-bg-[size:40px_40px] tw-opacity-30 tw-z-0"></div>
    <div class="tw-absolute tw-top-10 tw-left-1/2 tw-transform -tw-translate-x-1/2 tw-w-[120%] tw-h-[120%] tw-bg-gradient-radial tw-from-primary-100/50 tw-to-transparent tw-opacity-70 tw-pointer-events-none"></div>

    <div class="tw-max-w-4xl tw-mx-auto tw-relative tw-z-10">
        <div class="tw-relative tw-group">
            <div class="tw-absolute tw-inset-0 tw-bg-primary-300 tw-rounded-2xl tw-blur-[40px] tw-opacity-20 group-hover:tw-opacity-40 tw-z-0 tw-animate-pulse-glow tw-transition-opacity"></div>
            <div class="glass-morphism tw-relative tw-z-10 tw-rounded-2xl tw-border tw-border-primary-200 tw-px-6 tw-py-12 sm:tw-px-12 tw-text-center">
                <h2 class="tw-text-3xl md:tw-text-4xl tw-font-bold tw-text-gray-900 tw-mb-4">
                    Siap Mulai <span class="text-gradient">Jualan Hari Ini?</span>
                </h2>
                <p class="tw-text-lg tw-text-gray-600 tw-max-w-2xl tw-mx-auto tw-mb-8">
                    Daftar gratis, isi saldo, dan terima pesanan pertama Anda. Butuh bantuan memulai? Chat admin kami.
                </p>
                <div class="tw-flex tw-flex-col sm:tw-flex-row tw-items-center tw-justify-center tw-gap-3 sm:tw-gap-4">
                    <button class="tw-w-full sm:tw-w-auto btn-primary btn-glow tw-text-base tw-py-3 tw-px-8 tw-flex tw-items-center tw-justify-center" onclick="window.location.href='{{ route('register') }}'">
                        <span>Daftar Jadi Reseller</span>
                        <x-icons.arrow-right class="tw-w-4 tw-h-4 tw-ml-2" />
                    </button>
                    <button class="tw-w-full sm:tw-w-auto btn-outline tw-text-base tw-py-3 tw-px-8 tw-flex tw-items-center tw-justify-center" onclick="window.location.href='https://wa.me/6285931018333?text=Halo%20admin%20TINPED%2C%20saya%20tertarik%20jadi%20reseller'">
                        <x-social-icons.whatsapp class="tw-w-4 tw-h-4 tw-mr-2" />
                        <span>Chat Admin</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
