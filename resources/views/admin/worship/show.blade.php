@extends('components.admin.layout')
@section('page_title', 'Detail Ibadah Minggu')

@section('content')
<!-- Header -->
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="#" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
            <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
                <i class="fas fa-arrow-left"></i>
            </div>
            Kembali ke Daftar Ibadah
        </a>
        <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Berjalan Bersama Tuhan di Tengah Badai</h2>
        <div class="flex flex-wrap items-center gap-3 mt-3">
            <div class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-white border border-gray-200 shadow-sm text-gray-700">
                <i class="far fa-calendar-alt text-gray-400 mr-2"></i> 26 April 2026
            </div>
            <div class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-white border border-gray-200 shadow-sm text-gray-700">
                <i class="far fa-clock text-church-gold mr-2"></i> Kebaktian Umum 1 (07:00)
            </div>
            <div class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-purple-50 text-purple-700 border border-purple-100 shadow-sm">
                <div class="w-2 h-2 rounded-full bg-purple-600 mr-2"></div> Prapaskah 1
            </div>
        </div>
    </div>
    
    <div class="flex gap-3">
        <a href="#" class="px-5 py-2.5 bg-white border border-church-gold/30 rounded-xl text-church-dark font-bold hover:bg-church-gold/10 transition-colors shadow-sm flex items-center gap-2 text-sm">
            <i class="fas fa-edit text-church-gold"></i> Edit Jadwal
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Left Column: Video & Nas Card -->
    <div class="lg:col-span-1 space-y-6">
        <!-- Live Stream Panel -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="aspect-video bg-gray-900 relative group flex items-center justify-center cursor-pointer">
                <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-colors"></div>
                <div class="w-16 h-16 rounded-full bg-red-600 flex items-center justify-center text-white shadow-lg shadow-red-500/30 transform group-hover:scale-110 transition-transform relative z-10">
                    <i class="fas fa-play text-2xl ml-1"></i>
                </div>
            </div>
            <div class="p-6">
                <h4 class="font-bold text-church-dark mb-1">Tautan YouTube Live</h4>
                <p class="text-xs text-red-500 font-bold mb-4 flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span> Streaming Ready</p>
                <input type="text" readonly value="https://youtube.com/watch?v=mockurlid" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-500 font-mono outline-none">
            </div>
        </div>

        <!-- Nas Alkitab Card -->
        <div class="bg-gradient-to-br from-church-dark to-slate-900 rounded-2xl shadow-lg border border-church-gold/20 p-8 text-white text-center relative overflow-hidden">
            <i class="fas fa-quote-left absolute top-4 left-4 text-4xl text-white/5"></i>
            <div class="w-12 h-12 rounded-full bg-church-gold/20 text-church-gold mx-auto flex items-center justify-center mb-4 border border-church-gold/30">
                <i class="fas fa-book-open text-xl"></i>
            </div>
            <p class="font-serif italic text-lg text-white/90 leading-relaxed">
                "Sekalipun aku berjalan dalam lembah kekelaman, aku tidak takut bahaya, sebab Engkau besertaku..."
            </p>
            <div class="mt-6 border-t border-white/10 pt-4">
                <h4 class="font-bold text-church-gold text-sm tracking-widest uppercase">Mazmur 23:4</h4>
                <p class="text-xs text-white/50 mt-1">Nas Acuan Khotbah</p>
            </div>
        </div>
    </div>

    <!-- Right Column: Assignments -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Internal Stewards -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-church-warm/20 flex justify-between items-center">
                <h3 class="text-lg font-serif font-bold text-church-dark flex items-center gap-2">
                    <i class="fas fa-pray text-church-gold"></i> Penugasan Penatalayan
                </h3>
                <span class="text-xs font-bold text-gray-500 uppercase tracking-widest bg-white px-3 py-1 rounded-full border border-gray-200">2 Jemaat</span>
            </div>
            <div class="p-0">
                <table class="w-full text-left border-collapse">
                    <tbody class="divide-y divide-gray-50 text-sm">
                        <!-- Steward 1 -->
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 w-1/3">
                                <span class="font-bold text-gray-600 uppercase tracking-wide text-xs">Pengkhotbah</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-8 w-8 rounded-lg bg-yellow-50 text-yellow-700 flex items-center justify-center font-bold text-xs border border-yellow-100">BS</div>
                                    <div>
                                        <div class="font-bold text-church-dark">Budi Santoso</div>
                                        <div class="text-xs text-gray-400 mt-0.5">Penatua Aktif</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="text-xs font-bold text-blue-600 hover:text-blue-800">Lihat Profil</a>
                            </td>
                        </tr>
                        <!-- Steward 2 -->
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 w-1/3">
                                <span class="font-bold text-gray-600 uppercase tracking-wide text-xs">Liturgos</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-8 w-8 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center font-bold text-xs border border-blue-100">MI</div>
                                    <div>
                                        <div class="font-bold text-church-dark">Maria Irawan</div>
                                        <div class="text-xs text-gray-400 mt-0.5">Jemaat Umum</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="text-xs font-bold text-blue-600 hover:text-blue-800">Lihat Profil</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- External Guests -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                <h3 class="text-lg font-serif font-bold text-church-dark flex items-center gap-2">
                    <i class="fas fa-handshake text-purple-600"></i> Tamu Khusus / Eksternal
                </h3>
                <span class="text-xs font-bold text-purple-600 uppercase tracking-widest bg-purple-50 px-3 py-1 rounded-full border border-purple-100">1 Tamu</span>
            </div>
            <div class="p-6">
                <!-- Guest Item -->
                <div class="flex items-start gap-4 p-4 rounded-xl border border-gray-100 bg-white shadow-sm">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-100 to-indigo-50 text-purple-600 flex items-center justify-center text-xl shrink-0">
                        <i class="fas fa-music"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-church-dark text-lg">Paduan Suara GKI Kebayoran Baru</h4>
                        <p class="text-sm font-bold text-purple-600 mt-1 uppercase tracking-widest text-[11px]">Persembahan Pujian Ekstra</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
