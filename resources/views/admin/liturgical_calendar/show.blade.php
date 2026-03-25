@extends('components.admin.layout')
@section('page_title', 'Detail Kalender Liturgi')

@section('content')
<!-- Header -->
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="#" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
            <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
                <i class="fas fa-arrow-left"></i>
            </div>
            Kembali ke Kalender
        </a>
        <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Profil Pekan Liturgi</h2>
    </div>
    
    <div class="flex gap-3">
        <a href="#" class="px-5 py-2.5 bg-white border border-church-gold/30 rounded-xl text-church-dark font-bold hover:bg-church-gold/10 transition-colors shadow-sm flex items-center gap-2 text-sm">
            <i class="fas fa-edit text-church-gold"></i> Edit Liturgi
        </a>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Left Profile Card -->
    <div class="md:col-span-1 space-y-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden text-center">
            <!-- Dynamic Background based on Liturgy Color -->
            <div class="h-24 bg-purple-600 relative">
                <div class="absolute inset-0 bg-black/10"></div>
            </div>
            <div class="relative px-6 pb-6 -mt-12">
                <div class="w-24 h-24 rounded-2xl bg-white p-1.5 mx-auto shadow-md mb-4 flex items-center justify-center border border-gray-100 relative z-10">
                    <div class="w-full h-full rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-3xl">
                        <i class="fas fa-cross"></i>
                    </div>
                </div>
                
                <h3 class="text-2xl font-serif font-bold text-church-dark">Prapaskah 1</h3>
                <span class="inline-flex items-center gap-2 mt-2 px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-600 border border-gray-200 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-purple-600"></span> Warna: Ungu
                </span>
                
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <div class="text-3xl font-bold text-church-dark mb-1">4</div>
                    <div class="text-xs font-semibold text-gray-500 uppercase tracking-widest">Ibadah Menggunakan Liturgi Ini</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Details -->
    <div class="md:col-span-2 space-y-6">
        
        <!-- Mock Data Table for Worships under this liturgy -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                <h3 class="text-base font-bold text-church-dark">Sebagian Ibadah Berkaitan</h3>
                <span class="text-xs text-blue-600 font-bold hover:underline cursor-pointer">Lihat Semua</span>
            </div>
            <div class="p-4 space-y-3 relative">
                <!-- Data Row -->
                <div class="flex items-center gap-4 p-3 hover:bg-gray-50 rounded-xl transition-colors border border-transparent hover:border-gray-100">
                    <div class="h-10 w-10 rounded-lg bg-church-dark/5 text-church-dark flex items-center justify-center font-bold text-sm border border-gray-200"><i class="far fa-calendar-alt"></i></div>
                    <div class="flex-1">
                        <div class="font-bold text-church-dark text-sm">Berjalan Bersama Tuhan di Tengah Badai</div>
                        <div class="text-xs text-gray-500 mt-0.5">26 April 2026 • Kebaktian Umum 1</div>
                    </div>
                    <div>
                        <a href="#" class="px-3 py-1.5 text-xs font-bold text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors border border-blue-100">Lihat Ibadah</a>
                    </div>
                </div>
                
                <div class="absolute inset-0 bg-gradient-to-t from-white via-white/40 to-transparent flex items-end justify-center pb-2 pointer-events-none">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
