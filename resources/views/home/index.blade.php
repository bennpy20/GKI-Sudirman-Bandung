@extends('components.layout')

@section('title')
    GKI Sudirman
@endsection

@section('content')
<!-- Detail View: Devotional -->
<template x-if="selectedDevotional">
    <div class="w-full mx-auto">
        <button @click="selectedDevotional = null" class="flex items-center gap-2 text-church-gold font-bold mb-8 hover:gap-3 transition-all">
            <svg class="w-5 h-5 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            Kembali ke Daftar
        </button>
        <div class="bg-white p-10 rounded-[40px] card-shadow border border-black/5">
            <span class="text-church-gold font-bold text-xs uppercase tracking-widest mb-4 block" x-text="formatDate(selectedDevotional.date)"></span>
            <h1 class="text-4xl md:text-5xl font-serif mb-6 leading-tight" x-text="selectedDevotional.title"></h1>
            <div class="flex items-center gap-2 text-sm opacity-50 italic mb-10 pb-6 border-b border-black/5">
                Oleh: <span x-text="selectedDevotional.author"></span>
            </div>
            <div class="text-church-dark/80 text-lg leading-relaxed space-y-6 whitespace-pre-wrap font-serif" x-text="selectedDevotional.content"></div>
        </div>
    </div>
</template>

<!-- Detail View: Article -->
<template x-if="selectedArticle">
    <div class="max-w-4xl mx-auto">
        <button @click="selectedArticle = null" class="flex items-center gap-2 text-church-gold font-bold mb-8 hover:gap-3 transition-all">
            <svg class="w-5 h-5 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            Kembali ke Daftar
        </button>
        <div class="bg-white p-10 rounded-[40px] card-shadow border border-black/5">
            <span class="text-church-gold font-bold text-xs uppercase tracking-widest mb-4 block">
                <span x-text="selectedArticle.category.toUpperCase()"></span> • <span x-text="formatDate(selectedArticle.date)"></span>
            </span>
            <h1 class="text-4xl md:text-5xl font-serif mb-6 leading-tight" x-text="selectedArticle.title"></h1>
            <div class="flex items-center gap-2 text-sm opacity-50 italic mb-10 pb-6 border-b border-black/5">
                Oleh: <span x-text="selectedArticle.author"></span>
            </div>
            <div class="text-church-dark/80 text-lg leading-relaxed space-y-6 whitespace-pre-wrap" x-text="selectedArticle.content"></div>
        </div>
    </div>
</template>

<!-- Tab Content -->
<div x-show="!selectedDevotional && !selectedArticle">
    <div x-show="currentRoute === 'home.index'">
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
                        <a href="{{ route('warta_kebaktian.index') }}" 
                            class="w-full sm:w-auto bg-church-gold hover:brightness-110 text-white px-8 py-3.5 rounded-full font-bold shadow-lg shadow-church-gold/30 hover:shadow-church-gold/60 transform hover:-translate-y-1 transition-all duration-300 text-center">
                            Warta Jemaat
                        </a>
                        <a href="{{ route('hubungi_kami.index') }}"
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
                    <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-sm border border-black/5 cursor-pointer group" @click="selectedDevotional = devotionals[0]">
                        <div class="flex flex-col md:flex-row gap-8">
                            <div class="flex-1 order-2 md:order-1">
                                <span class="text-church-gold font-bold text-xs uppercase tracking-widest mb-3 block" x-text="formatDate(devotionals[0].date)"></span>
                                <h3 class="text-2xl sm:text-3xl font-serif mb-4 group-hover:text-church-gold transition-colors" x-text="devotionals[0].title"></h3>
                                <p class="text-church-dark/60 mb-6 line-clamp-3 leading-relaxed" x-text="devotionals[0].content"></p>
                                <span class="text-church-gold font-bold flex items-center gap-2 group-hover:translate-x-2 transition-transform">
                                    Baca Selengkapnya &rarr;
                                </span>
                            </div>
                            <div class="w-full md:w-48 h-48 rounded-2xl overflow-hidden shrink-0 order-1 md:order-2">
                                <img src="https://picsum.photos/seed/dev-1/400/400" alt="Renungan" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            </div>
                        </div>
                    </div>
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
                            Jadwal Rutin
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
                        <template x-for="b in birthdays" :key="b.name">
                            <div class="flex items-center justify-between border-b border-black/5 pb-3 last:border-0 last:pb-0">
                                <span class="font-medium text-church-dark" x-text="b.name"></span>
                                <span class="text-sm text-church-dark/50 bg-black/5 px-2 py-1 rounded-md" x-text="b.date"></span>
                            </div>
                        </template>
                        <div class="pt-2 text-center">
                            <p class="text-xs text-church-dark/50 italic">"Kiranya Tuhan memberkati dan memelihara engkau."</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    
    <!-- Warta Kebaktian -->
    <!--
    <div x-show="activeTab === 'warta-kebaktian'">
        <div class="mb-10">
            <h2 class="text-3xl font-serif mb-2">Warta Kebaktian</h2>
            <p class="text-church-dark/50 italic">Daftar penatalayan ibadah minggu ini</p>
            <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
        </div>
        <div class="bg-white rounded-3xl card-shadow border border-black/5 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-church-warm/30">
                            <th class="p-6 font-serif text-xl border-b border-black/5">Tugas / Waktu</th>
                            <th class="p-6 font-serif text-xl border-b border-black/5 text-center">07.00 WIB</th>
                            <th class="p-6 font-serif text-xl border-b border-black/5 text-center">09.00 WIB</th>
                            <th class="p-6 font-serif text-xl border-b border-black/5 text-center">17.00 WIB</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-black/5">
                        <template x-for="role in roles" :key="role">
                            <tr class="hover:bg-church-warm/10 transition-colors">
                                <td class="p-6 font-bold text-church-dark/70" x-text="role"></td>
                                <template x-for="time in ['07.00 WIB', '09.00 WIB', '17.00 WIB']">
                                    <td class="p-6 text-center text-church-dark/60 italic" x-text="getPenatalayan(role, time)"></td>
                                </template>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    -->

    <!-- Warta Jemaat / Kegiatan -->
    <!--
    <div x-show="activeTab === 'warta-jemaat' || activeTab === 'warta-kegiatan'">
        <div class="mb-10">
            <h2 class="text-3xl font-serif mb-2" x-text="activeTab === 'warta-jemaat' ? 'Warta Jemaat' : 'Warta Kegiatan'"></h2>
            <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <template x-for="item in warta.filter(w => activeTab.includes(w.type))" :key="item.title">
                <div class="bg-white rounded-3xl overflow-hidden card-shadow border border-black/5 flex flex-col">
                    <img :src="item.image_url" class="h-48 w-full object-cover">
                    <div class="p-6">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-church-gold mb-2 block" x-text="formatDate(item.date)"></span>
                        <h3 class="text-xl font-serif mb-3" x-text="item.title"></h3>
                        <p class="text-sm text-church-dark/60 mb-6" x-text="item.description"></p>
                        <button class="w-full py-3 bg-church-warm/30 rounded-xl text-xs font-bold">Lihat Detail</button>
                    </div>
                </div>
            </template>
        </div>
    </div>
    -->

    <!-- Renungan List -->
    <!--
    <div x-show="activeTab === 'renungan'">
        <div class="mb-10">
            <h2 class="text-3xl font-serif mb-2">Renungan Harian</h2>
            <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <template x-for="d in devotionals" :key="d.title">
                <div @click="selectedDevotional = d" class="bg-white p-8 rounded-3xl card-shadow border border-black/5 cursor-pointer group">
                    <span class="text-church-gold font-bold text-[10px] uppercase tracking-widest mb-3 block" x-text="formatDate(d.date)"></span>
                    <h3 class="text-2xl font-serif mb-4 group-hover:text-church-gold transition-colors" x-text="d.title"></h3>
                    <p class="text-church-dark/60 text-sm line-clamp-4 leading-relaxed mb-6" x-text="d.content"></p>
                    <div class="flex items-center justify-between pt-4 border-t border-black/5">
                        <span class="text-xs italic opacity-40">Oleh: <span x-text="d.author"></span></span>
                        <svg class="w-5 h-5 text-church-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </div>
                </div>
            </template>
        </div>
    </div>
    -->

    <!-- Artikel List -->
    <!--
    <div x-show="activeTab.startsWith('artikel-')">
        <div class="mb-10">
            <h2 class="text-3xl font-serif mb-2 capitalize" x-text="activeTab.replace('artikel-', 'Artikel ')"></h2>
            <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
        </div>
        <div class="w-full mx-auto space-y-8">
            <template x-for="a in articles.filter(art => activeTab.includes(art.category))" :key="a.title">
                <div @click="selectedArticle = a" class="bg-white p-8 rounded-3xl card-shadow border border-black/5 cursor-pointer group hover:border-church-gold/30 transition-all">
                    <h3 class="text-2xl font-serif mb-3 group-hover:text-church-gold transition-colors" x-text="a.title"></h3>
                    <div class="flex items-center gap-4 text-xs opacity-50 mb-6">
                        <span x-text="a.author"></span>
                        <span>•</span>
                        <span x-text="formatDate(a.date)"></span>
                    </div>
                    <p class="text-church-dark/70 leading-relaxed line-clamp-3" x-text="a.content"></p>
                    <button class="mt-6 text-church-gold font-bold text-sm">Baca Selengkapnya</button>
                </div>
            </template>
        </div>
    </div>
    -->

    <!-- Bible Reading Page -->
    <!--
    <div x-show="activeTab === 'tentang-alkitab'">
        <div class="mb-10">
            <h2 class="text-3xl font-serif mb-2">Program Baca Alkitab 1 Tahun</h2>
            <p class="text-church-dark/50 italic">Mari selesaikan pembacaan Alkitab dalam 365 hari</p>
            <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
        </div>

        <div class="flex gap-2 overflow-x-auto pb-6 mb-8 no-scrollbar">
            <template x-for="(m, i) in months" :key="m">
                <button 
                    @click="activeMonth = i"
                    class="px-6 py-2 rounded-full font-bold text-sm whitespace-nowrap transition-all"
                    :class="activeMonth === i ? 'bg-church-gold text-white shadow-lg' : 'bg-white text-church-dark/40 border border-black/5'"
                    x-text="m">
                </button>
            </template>
        </div>

        <div class="bg-white rounded-[40px] card-shadow border border-black/5 overflow-hidden">
            <div class="p-8 border-b border-black/5 bg-church-warm/10 flex justify-between items-center">
                <h3 class="text-2xl font-serif">Jadwal Bulan <span x-text="months[activeMonth]"></span></h3>
                <div class="text-sm font-bold text-church-gold">
                    <span x-text="getMonthlyProgress()"></span> / 30 Selesai
                </div>
            </div>
            <div class="divide-y divide-black/5">
                <template x-for="day in getDaysInMonth()" :key="day">
                    <div @click="toggleBibleDay(day)" class="flex items-center justify-between p-6 hover:bg-church-warm/20 transition-colors cursor-pointer group">
                        <div class="flex items-center gap-6">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-all"
                                :class="isDayChecked(day) ? 'bg-church-gold text-white' : 'bg-church-warm/30 text-church-dark/30 group-hover:bg-church-warm/50'">
                                <span x-text="day % 30 || 30"></span>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg" x-text="getPassage(day)"></h4>
                                <p class="text-xs opacity-40">Pembacaan Hari ke-<span x-text="day"></span></p>
                            </div>
                        </div>
                        <div x-show="isDayChecked(day)" class="text-church-gold">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div x-show="!isDayChecked(day)" class="w-6 h-6 rounded-full border-2 border-black/10 group-hover:border-church-gold/30 transition-all"></div>
                    </div>
                </template>
            </div>
        </div>

        <div class="mt-12 bg-church-dark text-white p-10 rounded-[40px] flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="text-center md:text-left">
                <h4 class="text-2xl font-serif text-church-gold mb-2">Progres Keseluruhan</h4>
                <p class="text-sm opacity-60">Teruslah setia dalam membaca Firman Tuhan setiap hari.</p>
            </div>
            <div class="flex items-center gap-6">
                <div class="text-right">
                    <span class="text-4xl font-serif text-church-gold" x-text="bibleChecked.length"></span>
                    <span class="text-xl opacity-40 ml-2">/ 365</span>
                </div>
                <div class="w-32 h-2 bg-white/10 rounded-full overflow-hidden">
                    <div class="h-full bg-church-gold transition-all duration-500" :style="'width: ' + ((bibleChecked.length / 365) * 100) + '%'"></div>
                </div>
            </div>
        </div>
    </div>
    -->

    <!-- Visi Misi Page -->
    <!--
    <div x-show="activeTab === 'tentang-visi'">
        <div class="mb-10">
            <h2 class="text-3xl font-serif mb-2">Visi & Misi</h2>
            <p class="text-church-dark/50 italic">Arah dan tujuan GKI Sudirman</p>
            <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
        </div>
        <div class="w-full mx-auto space-y-4">
            <div class="bg-white rounded-2xl border border-black/5 overflow-hidden card-shadow" x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-church-warm/20 transition-colors">
                    <span class="font-serif text-xl">Visi GKI Sudirman</span>
                    <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" class="p-5 py-4 text-church-dark/70 leading-relaxed border-t border-black/5">
                    Menjadi jemaat yang akrab, terbuka dan bersahabat
                </div>
            </div>
            <div class="bg-white rounded-2xl border border-black/5 overflow-hidden card-shadow" x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-church-warm/20 transition-colors">
                    <span class="font-serif text-xl">Misi GKI Sudirman</span>
                    <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" class="p-5 py-4 text-church-dark/70 leading-relaxed border-t border-black/5">
                    1. Memfasilitasi perjumpaan Allah dengan jemaat, sehingga jemaat mengalami pertumbuhan spiritual.</br>
                    2. Mengupayakan agar jemaat hidup dalam kasih dan persaudaraan yang akrab dan terbuka.</br>
                    3. Meningkatkan kecintaan jemaat terhadap GKI Sudirman sebagai tubuh Kristus.</br>
                    4. Melaksanakan kesaksian dan pelayanan di gereja dan masyarakat.</br>
                    5. Melakukan perwujudan keesaan gereja dan persaudaraan umat manusia.</br>
                    6. Meningkatkan pertumbuhan anggota jemaat.</br>
                    7. Mengembangkan sarana prasarana untuk memfasilitasi terlaksananya kegiatan Ibadah yang nyaman.
                </div>
            </div>
        </div>
    </div>
    -->

    <!-- Keanggotaan Page -->
    <!--
    <div x-show="activeTab === 'tentang-keanggotaan'">
        <div class="mb-10">
            <h2 class="text-3xl font-serif mb-2">Keanggotaan</h2>
            <p class="text-church-dark/50 italic">Informasi seputar keanggotaan jemaat</p>
            <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
        </div>
        <div class="w-full mx-auto space-y-4">
            <div class="bg-white rounded-2xl border border-black/5 overflow-hidden card-shadow" x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-church-warm/20 transition-colors">
                    <span class="font-serif text-xl">Cara Menjadi Anggota (Atestasi Masuk)</span>
                    <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" class="p-5 py-4 text-church-dark/70 leading-relaxed border-t border-black/5">
                    Jemaat dapat mengajukan surat atestasi dari gereja asal dengan melampirkan fotokopi surat baptis/sidi dan pas foto terbaru.
                </div>
            </div>
            <div class="bg-white rounded-2xl border border-black/5 overflow-hidden card-shadow" x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-church-warm/20 transition-colors">
                    <span class="font-serif text-xl">Atestasi Keluar</span>
                    <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" class="p-5 py-4 text-church-dark/70 leading-relaxed border-t border-black/5">
                    Bagi jemaat yang akan pindah keanggotaan, silakan mengajukan permohonan tertulis kepada Majelis Jemaat.
                </div>
            </div>
        </div>
    </div>
    -->

    <!-- Baptis & Nikah Page -->
    <!--
    <div x-show="activeTab === 'tentang-baptis'">
        <div class="mb-10">
            <h2 class="text-3xl font-serif mb-2">Baptisan & Pernikahan</h2>
            <p class="text-church-dark/50 italic">Persyaratan dan prosedur pelayanan</p>
            <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
        </div>
        <div class="w-full mx-auto space-y-4">
            <div class="bg-white rounded-2xl border border-black/5 overflow-hidden card-shadow" x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-church-warm/20 transition-colors">
                    <span class="font-serif text-xl">Baptis Kudus Anak</span>
                    <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" class="p-5 py-4 text-church-dark/70 leading-relaxed border-t border-black/5">
                    Persyaratan: Fotokopi akta kelahiran anak, surat nikah orang tua, dan salah satu orang tua adalah anggota GKI Sudirman.
                </div>
            </div>
            <div class="bg-white rounded-2xl border border-black/5 overflow-hidden card-shadow" x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-church-warm/20 transition-colors">
                    <span class="font-serif text-xl">Peneguhan & Pemberkatan Nikah</span>
                    <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" class="p-5 py-4 text-church-dark/70 leading-relaxed border-t border-black/5">
                    Prosedur: Mengisi formulir pendaftaran minimal 3 bulan sebelum hari H dan mengikuti katekisasi pranikah.
                </div>
            </div>
        </div>
    </div>
    -->

    <!-- Struktur Kemajelisan Page -->
    <!--
    <div x-show="activeTab === 'tentang-struktur'">
        <div class="mb-10">
            <h2 class="text-3xl font-serif mb-2">Struktur Kemajelisan</h2>
            <p class="text-church-dark/50 italic">Daftar pelayan Tuhan di GKI Sudirman</p>
            <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-4xl mx-auto">
            <template x-for="person in structure" :key="person.name">
                <div class="bg-white p-6 rounded-2xl border border-black/5 card-shadow flex items-center gap-4">
                    <div class="w-12 h-12 bg-church-gold/10 rounded-full flex items-center justify-center text-church-gold font-bold" x-text="person.name.charAt(0)"></div>
                    <div>
                        <h4 class="font-bold" x-text="person.name"></h4>
                        <p class="text-xs opacity-50" x-text="person.role"></p>
                    </div>
                </div>
            </template>
        </div>
    </div>
    -->

    <!-- Kontak Page -->
    <!--
    <div x-show="activeTab === 'kontak'">
        <div class="mb-10">
            <h2 class="text-3xl font-serif mb-2">Hubungi Kami</h2>
            <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="space-y-8">
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-church-gold/10 rounded-2xl text-church-gold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold mb-1">Alamat</h4>
                        <p class="text-sm text-church-dark/60">Jl. Jenderal Sudirman No. 638, Bandung 40183</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-church-gold/10 rounded-2xl text-church-gold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold mb-1">Telepon</h4>
                        <p class="text-sm text-church-dark/60">(022) 6002374</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-church-gold/10 rounded-2xl text-church-gold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold mb-1">Email</h4>
                        <p class="text-sm text-church-dark/60">gkisudirman@yahoo.com</p>
                    </div>
                </div>
            </div>
            <form class="bg-white p-8 rounded-[40px] card-shadow border border-black/5 space-y-4">
                <input type="text" placeholder="Nama Lengkap" class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold">
                <input type="email" placeholder="Alamat Email" class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold">
                <textarea placeholder="Pesan Anda" rows="5" class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold"></textarea>
                <button class="w-full bg-church-dark text-white py-4 rounded-2xl font-bold">Kirim Pesan</button>
            </form>
        </div>
    </div>
    -->
</div>
@endsection