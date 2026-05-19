@extends('components.layout')

@section('title')
    GKI Sudirman
@endsection

@section('content')
<section class="relative h-[50vh] sm:h-[60vh] lg:h-[70vh] min-h-[450px] w-full max-w-7xl mx-auto rounded-3xl md:rounded-[40px] overflow-hidden mb-16 group shadow-2xl">
    <img src="{{ asset('banner-gki-sudirman.png') }}" alt="GKI Sudirman" class="w-full h-full object-cover transition-transform duration-1000 ease-in-out group-hover:scale-110">
    <div class="absolute inset-0 bg-linear-to-r from-black/90 via-black/70 to-black/60 sm:via-black/50 sm:to-transparent group-hover:from-black/95 transition-all duration-700"></div>
    <div class="absolute inset-0 flex flex-col justify-center p-6 sm:p-10 md:p-16 text-white">
        <div class="relative z-10 max-w-3xl transform transition-all duration-700 translate-y-2 group-hover:translate-y-0">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif mb-4 leading-tight drop-shadow-lg">
                Selamat Datang di <br class="hidden sm:block"> 
                <span class="text-church-gold drop-shadow-md">GKI Sudirman</span>
            </h1>
            <p class="text-white/80 text-sm sm:text-base md:text-lg mb-8 drop-shadow-md leading-relaxed">
                Menjadi jemaat yang akrab, terbuka dan bersahabat
            </p>
            <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                <a href="#" 
                    class="w-full sm:w-auto bg-church-gold hover:brightness-110 text-white px-8 py-3.5 rounded-full font-bold shadow-lg shadow-church-gold/30 hover:shadow-church-gold/60 transform hover:-translate-y-1 transition-all duration-300 text-center">
                    Jadwal Kebaktian
                </a>
                <a href="#"
                    class="w-full sm:w-auto bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 hover:border-white/40 px-8 py-3.5 rounded-full font-bold transform hover:-translate-y-1 transition-all duration-300 text-center">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
    <div class="lg:col-span-2 space-y-16">
        <section>
            <div class="mb-10">
                <h2 class="text-3xl font-serif mb-2">Renungan Hari Ini</h2>
                <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
            </div>
            <a href="{{ route('renungan_harian.index') }}" class="block bg-white p-6 sm:p-8 rounded-3xl shadow-sm border border-black/5 cursor-pointer group hover:border-church-gold/30 transition-all">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="flex-1 order-2 md:order-1">
                        <span class="text-church-gold font-bold text-xs uppercase tracking-widest mb-3 block">27 Februari 2026</span>
                        <h3 class="text-2xl sm:text-3xl font-serif mb-4 group-hover:text-church-gold transition-colors">Membangun Iman di Tengah Badai</h3>
                        <p class="text-church-dark/60 mb-6 line-clamp-3 leading-relaxed">Renungan hari ini mengajak kita untuk tetap percaya meskipun keadaan di sekitar kita tampak tidak menentu. Seperti murid-murid Yesus di tengah danau yang dilanda badai...</p>
                        <span class="text-church-gold font-bold flex items-center gap-2 group-hover:translate-x-2 transition-transform">
                            Baca Selengkapnya &rarr;
                        </span>
                    </div>
                    <div class="w-full md:w-48 h-48 rounded-2xl overflow-hidden shrink-0 order-1 md:order-2">
                        <img src="https://picsum.photos/seed/dev-1/400/400" alt="Renungan" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </div>
                </div>
            </a>
        </section>
        <section>
            <div class="mb-10 flex items-end justify-between">
                <div>
                    <h2 class="text-3xl font-serif mb-2">Khotbah Terbaru</h2>
                    <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
                </div>
                <a href="#" class="hidden sm:block text-sm font-bold text-church-gold hover:underline">Lihat Semua Video &rarr;</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
                <div class="bg-white p-4 rounded-3xl shadow-sm border border-black/5 group">
                    <div class="w-full aspect-video rounded-2xl overflow-hidden bg-black/5 relative mb-4">
                        <iframe class="w-full h-full absolute top-0 left-0" src="https://www.youtube.com/embed/x6RkTLwIhzY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div class="px-2 pb-2">
                        <span class="text-xs font-bold text-church-gold uppercase tracking-wider block mb-1">Minggu, 8 Maret 2026</span>
                        <h3 class="text-lg font-serif font-bold text-church-dark leading-snug mb-1 group-hover:text-church-gold transition-colors">Bertumbuh Dalam Kasih dan Pengharapan</h3>
                        <p class="text-church-dark/60 text-sm">Pdt. Yohanes</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-3xl shadow-sm border border-black/5 group">
                    <div class="w-full aspect-video rounded-2xl overflow-hidden bg-black/5 relative mb-4">
                        <iframe class="w-full h-full absolute top-0 left-0" src="https://www.youtube.com/embed/zY72QosRbkw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div class="px-2 pb-2">
                        <span class="text-xs font-bold text-church-gold uppercase tracking-wider block mb-1">Minggu, 1 Maret 2026</span>
                        <h3 class="text-lg font-serif font-bold text-church-dark leading-snug mb-1 group-hover:text-church-gold transition-colors">Menghadapi Badai Kehidupan</h3>
                        <p class="text-church-dark/60 text-sm">Pdt. Maria</p>
                    </div>
                </div>
            </div>
            <a href="#" class="block sm:hidden text-center mt-6 text-sm font-bold text-church-gold hover:underline">Lihat Semua Video &rarr;</a>
        </section>
    </div>
    <div class="space-y-12">
        <section>
            <div class="mb-6 flex flex-col items-start">
                <h3 class="text-2xl font-serif mb-2 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-church-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Kegiatan Mingguan
                </h3>
                <div class="w-12 h-1 bg-church-gold/50 rounded-full"></div>
            </div>
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-black/5">
                <ol class="border-l-2 border-church-gold/20 ml-3 space-y-8">                  
                    <li class="relative pl-6">            
                        <span class="absolute w-4 h-4 bg-church-gold rounded-full -left-[9px] ring-4 ring-white top-1"></span>
                        <h4 class="font-bold text-church-dark text-lg mb-4">Minggu</h4>
                        <div class="space-y-4">
                            <div>
                                <h5 class="font-bold text-church-dark/80 text-[15px]">Ibadah Umum</h5>
                                <p class="text-sm text-church-dark/60 mt-0.5">09.00 WIB</p>
                                <p class="text-sm text-church-dark/60 mt-0.5">Aula Kebaktian Lt. 3</p>
                            </div>
                            <div>
                                <h5 class="font-bold text-church-dark/80 text-[15px]">Kebaktian Sekolah Minggu</h5>
                                <p class="text-sm text-church-dark/60 mt-0.5">08.00 WIB</p>
                                <p class="text-sm text-church-dark/60 mt-0.5">Lobby SDK 6 BPK Penabur</p>
                            </div>
                            <div>
                                <h5 class="font-bold text-church-dark/80 text-[15px]">Kebaktian Remaja</h5>
                                <p class="text-sm text-church-dark/60 mt-0.5">08.45 WIB</p>
                                <p class="text-sm text-church-dark/60 mt-0.5">Lobby SMPK 5 BPK Penabur</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative pl-6">            
                        <span class="absolute w-4 h-4 bg-church-gold rounded-full -left-[9px] ring-4 ring-white top-1"></span>
                        <h4 class="font-bold text-church-dark text-lg mb-4">Kamis</h4>
                        <div class="space-y-4">
                            <div>
                                <h5 class="font-bold text-church-dark/80 text-[15px]">Persekutuan Usia Indah (Usinda)</h5>
                                <p class="text-sm text-church-dark/60 mt-0.5">10.00 WIB</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative pl-6">            
                        <span class="absolute w-4 h-4 bg-church-gold rounded-full -left-[9px] ring-4 ring-white top-1"></span>
                        <h4 class="font-bold text-church-dark text-lg mb-4">Sabtu</h4>
                        <div class="space-y-4">
                            <div>
                                <h5 class="font-bold text-church-dark/80 text-[15px]">Doa Pagi Jemaat</h5>
                                <p class="text-sm text-church-dark/60 mt-0.5">05.30 WIB</p>
                            </div>
                            <div>
                                <h5 class="font-bold text-church-dark/80 text-[15px]">Persekutuan Pemuda</h5>
                                <p class="text-sm text-church-dark/60 mt-0.5">18.00 WIB</p>
                            </div>
                        </div>
                    </li>
                </ol>
            </div>
        </section>
        <section>
            <div class="mb-6 flex flex-col items-start">
                <h3 class="text-2xl font-serif mb-2 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-church-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                    </svg>
                    HUT Jemaat
                </h3>
                <div class="w-12 h-1 bg-church-gold/50 rounded-full"></div>
            </div>
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-black/5 space-y-4">
                <div class="flex items-center justify-between border-b border-black/5 pb-3">
                    <span class="font-medium text-church-dark">Budi Santoso</span>
                    <span class="text-sm text-church-dark/50 bg-black/5 px-2 py-1 rounded-md">15 Maret</span>
                </div>
                <div class="flex items-center justify-between border-b border-black/5 pb-3">
                    <span class="font-medium text-church-dark">Yohana Maria</span>
                    <span class="text-sm text-church-dark/50 bg-black/5 px-2 py-1 rounded-md">27 Februari</span>
                </div>
                <div class="flex items-center justify-between border-b border-black/5 pb-3">
                    <span class="font-medium text-church-dark">Hendra Wijaya</span>
                    <span class="text-sm text-church-dark/50 bg-black/5 px-2 py-1 rounded-md">28 Februari</span>
                </div>
                <div class="pt-2 text-center">
                    <p class="text-xs text-church-dark/50 italic">"Kiranya Tuhan memberkati dan memelihara engkau."</p>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection