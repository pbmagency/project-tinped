<section class="tw-w-full tw-py-20 tw-px-6 lg:tw-px-12 tw-relative tw-overflow-hidden tw-bg-gray-50/80" data-aos="fade-up">
    <!-- Background Elements -->
    <div class="tw-absolute tw-inset-0 tw-bg-grid tw-bg-[size:40px_40px] tw-opacity-30 tw-z-0"></div>
    <div class="tw-absolute tw-top-40 -tw-left-20 tw-w-60 tw-h-60 tw-bg-primary-100 tw-rounded-full tw-filter tw-blur-[100px] tw-opacity-50 tw-animate-float"></div>
    
    <div class="tw-max-w-7xl tw-mx-auto tw-relative tw-z-10">
        <div class="tw-flex tw-flex-col tw-items-center tw-mb-14" data-aos="fade-up">
            <div class="tw-bg-primary tw-bg-opacity-10 tw-backdrop-blur-sm tw-rounded-full tw-px-4 tw-py-1.5 tw-flex tw-items-center tw-justify-center tw-mb-4 tw-border tw-border-primary-200">
                <span class="tw-text-primary tw-font-semibold tw-text-sm">Support & Help</span>
            </div>

            <!-- Heading -->
            <h2 class="tw-text-3xl md:tw-text-4xl tw-font-bold tw-text-center tw-text-gray-900 tw-mb-4">
                <span class="text-gradient">Pertanyaan</span> Yang Sering Ditanyakan
            </h2>
            
            <!-- Subheading -->
            <p class="tw-text-lg tw-text-gray-600 tw-text-center tw-max-w-2xl">
                Jawaban untuk pertanyaan yang paling sering ditanyakan calon reseller.
            </p>
        </div>
        
        <!-- FAQ Accordion - Two-column layout -->
        <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-6" data-aos="fade-up" data-aos-delay="100">
            @php
            $faqItems = [
                [
                    "question" => "Apakah ada biaya untuk jadi reseller?",
                    "answer" => "Tidak ada. Daftar gratis, tanpa biaya bulanan dan tanpa minimal order. Anda hanya membayar saldo untuk pesanan yang Anda proses."
                ],
                [
                    "question" => "Apakah harga reseller berbeda dengan harga umum?",
                    "answer" => "Saat ini semua member mendapat harga yang sama. Keuntungan Anda datang dari selisih antara harga modal di TINPED dan harga jual yang Anda tentukan sendiri."
                ],
                [
                    "question" => "Apakah pelanggan saya tahu saya memakai TINPED?",
                    "answer" => "Tidak. Pelanggan cukup memberi link atau username ke Anda. Pesanan dibuat dari akun Anda dan TINPED tidak pernah menghubungi pelanggan Anda."
                ],
                [
                    "question" => "Berapa modal minimal untuk mulai?",
                    "answer" => "Anda bisa mulai dari saldo kecil sesuai minimal deposit metode pembayaran yang dipilih. Isi saldo secukupnya dulu, lalu tambah seiring pesanan bertambah."
                ],
                [
                    "question" => "Bagaimana jika followers pelanggan saya turun?",
                    "answer" => "Untuk layanan bergaransi, Anda bisa mengajukan refill langsung dari halaman riwayat pesanan. Cek keterangan garansi di setiap layanan sebelum memesan."
                ],
                [
                    "question" => "Bagaimana jika pesanan gagal diproses?",
                    "answer" => "Saldo untuk pesanan yang gagal atau dibatalkan dikembalikan otomatis ke akun Anda, jadi modal Anda tidak hilang."
                ],
                [
                    "question" => "Bisa memproses banyak pesanan sekaligus?",
                    "answer" => "Bisa. Gunakan fitur order massal untuk mengirim banyak pesanan dalam satu form."
                ],
                [
                    "question" => "Saya punya website atau bot sendiri, bisa disambungkan?",
                    "answer" => "Bisa. TINPED menyediakan API untuk order, cek status, dan refill. Lihat halaman Dokumentasi API untuk detailnya."
                ]
            ];
            $halfCount = ceil(count($faqItems) / 2);
            $firstHalf = array_slice($faqItems, 0, $halfCount);
            $secondHalf = array_slice($faqItems, $halfCount);
            @endphp

            <!-- First column -->
            <div class="tw-bg-white tw-rounded-xl tw-shadow-lg hover:tw-shadow-glow-primary tw-border tw-border-[#e9e7ff] tw-overflow-hidden tw-transition-all tw-duration-300">
                <div class="tw-w-full">
                    @foreach($firstHalf as $index => $item)
                    <div class="accordion-item tw-border-b last:tw-border-0 tw-border-[#e9e7ff] tw-overflow-hidden hover:tw-bg-[#f3f2ff]/30 tw-transition-colors tw-duration-300">
                        <div class="accordion-trigger tw-px-6 tw-py-5 tw-text-left tw-text-gray-800 tw-font-semibold tw-group tw-flex tw-items-center tw-justify-between tw-cursor-pointer">
                            <span class="group-hover:tw-text-primary tw-transition-colors tw-duration-300">{{ $item['question'] }}</span>
                            <span class="plus tw-accordion-icon tw-transition-transform tw-duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-5 tw-w-5 tw-shrink-0 tw-text-[#9a8ff8] tw-transition-transform tw-duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </span>
                            <span class="minus tw-hidden tw-accordion-icon tw-transition-transform tw-duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-5 tw-w-5 tw-shrink-0 tw-text-[#7367f0] tw-transition-transform tw-duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </span>
                        </div>
                        <div class="accordion-content tw-hidden tw-px-6 tw-pb-5 tw-text-gray-600 tw-font-light">
                            {{ $item['answer'] }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Second column -->
            <div class="tw-bg-white tw-rounded-xl tw-shadow-lg hover:tw-shadow-glow-primary tw-border tw-border-[#e9e7ff] tw-overflow-hidden tw-transition-all tw-duration-300">
                <div class="tw-w-full">
                    @foreach($secondHalf as $index => $item)
                    <div class="accordion-item tw-border-b last:tw-border-0 tw-border-[#e9e7ff] tw-overflow-hidden hover:tw-bg-[#f3f2ff]/30 tw-transition-colors tw-duration-300">
                        <div class="accordion-trigger tw-px-6 tw-py-5 tw-text-left tw-text-gray-800 tw-font-semibold tw-group tw-flex tw-items-center tw-justify-between tw-cursor-pointer">
                            <span class="group-hover:tw-text-primary tw-transition-colors tw-duration-300">{{ $item['question'] }}</span>
                            <span class="plus tw-accordion-icon tw-transition-transform tw-duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-5 tw-w-5 tw-shrink-0 tw-text-[#9a8ff8] tw-transition-transform tw-duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </span>
                            <span class="minus tw-hidden tw-accordion-icon tw-transition-transform tw-duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="tw-h-5 tw-w-5 tw-shrink-0 tw-text-[#7367f0] tw-transition-transform tw-duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </span>
                        </div>
                        <div class="accordion-content tw-hidden tw-px-6 tw-pb-5 tw-text-gray-600 tw-font-light">
                            {{ $item['answer'] }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- Still Have Questions Section -->
        <div class="tw-mt-16 tw-text-center" data-aos="fade-up" data-aos-delay="200">
            <h3 class="tw-text-xl tw-font-semibold tw-mb-4">Masih ada pertanyaan?</h3>
            <p class="tw-text-gray-600 tw-mb-6">Team support kami siap untuk membantu anda</p>
            <button class="btn-primary tw-text-base tw-py-3 tw-px-8 btn-glow tw-flex tw-items-center tw-justify-center tw-mx-auto" onclick="window.location.href='https://wa.me/6285931018333?text=Halo%20admin%20TINPED%2C%20saya%20mau%20tanya%20soal%20program%20reseller'">
                <span>Contact Support</span>
            </button>
        </div>
    </div>
</section>