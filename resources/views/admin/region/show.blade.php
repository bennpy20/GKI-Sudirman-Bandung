@extends('components.admin.layout')
@section('page_title', 'Detail Wilayah')

@section('content')
<!-- Header -->
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="#" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
            <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
                <i class="fas fa-arrow-left"></i>
            </div>
            Kembali ke Daftar Wilayah
        </a>
        <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Profil Wilayah</h2>
    </div>
    
    <div class="flex gap-3">
        <a href="#" class="px-5 py-2.5 bg-white border border-church-gold/30 rounded-xl text-church-dark font-bold hover:bg-church-gold/10 transition-colors shadow-sm flex items-center gap-2 text-sm">
            <i class="fas fa-edit text-church-gold"></i> Edit Wilayah
        </a>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Left Profile Card -->
    <div class="md:col-span-1 space-y-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden text-center">
            <div class="h-20 bg-gradient-to-r from-church-dark to-slate-800"></div>
            <div class="relative px-6 pb-6 -mt-10">
                <div class="w-20 h-20 rounded-2xl bg-white p-1.5 mx-auto shadow-md mb-4 flex items-center justify-center border border-gray-100">
                    <div class="w-full h-full rounded-xl bg-gradient-to-br from-church-gold to-yellow-600 flex items-center justify-center text-2xl text-church-dark">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                </div>
                
                <h3 class="text-2xl font-serif font-bold text-church-dark">Rayon Galilea</h3>
                <p class="text-sm font-medium text-gray-400 mt-1 uppercase tracking-widest">Wilayah Layanan</p>
                
                <div class="mt-6 p-4 bg-gray-50 rounded-xl border border-gray-100">
                    <div class="text-3xl font-bold text-church-dark mb-1">124</div>
                    <div class="text-xs font-semibold text-gray-500 uppercase tracking-widest">Total Jemaat</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Details -->
    <div class="md:col-span-2 space-y-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-church-warm/20">
                <h3 class="text-xl font-serif font-bold text-church-dark flex items-center gap-2">
                    <i class="fas fa-info-circle text-church-gold"></i> Deskripsi Jangkauan
                </h3>
            </div>
            <div class="p-6">
                <p class="text-base text-gray-700 leading-relaxed">
                    Mencakup jemaat yang berdomisili di area Bandung Barat, termasuk daerah Andir, Garuda, Rajawali, dan sekitarnya. Merupakan rayon dengan populasi terbanyak.
                </p>
            </div>
        </div>
        
        <!-- Mock Data Table for Members belonging to this Region -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                <h3 class="text-base font-bold text-church-dark">Sampel Jemaat Terdaftar</h3>
                <span class="text-xs text-blue-600 font-bold hover:underline cursor-pointer">Lihat Semua</span>
            </div>
            <div class="p-4 space-y-3 relative">
                <!-- Data Row -->
                <div class="flex items-center gap-4 p-3 hover:bg-gray-50 rounded-xl transition-colors border border-transparent hover:border-gray-100">
                    <div class="h-10 w-10 rounded-full bg-blue-50 text-blue-700 flex items-center justify-center font-bold text-sm">BS</div>
                    <div class="flex-1">
                        <div class="font-bold text-church-dark text-sm">Budi Santoso</div>
                        <div class="text-xs text-gray-500 mt-0.5">Penatua • Jl. Sudirman No 123</div>
                    </div>
                </div>
                <!-- Data Row -->
                <div class="flex items-center gap-4 p-3 hover:bg-gray-50 rounded-xl transition-colors border border-transparent hover:border-gray-100">
                    <div class="h-10 w-10 rounded-full bg-purple-50 text-purple-700 flex items-center justify-center font-bold text-sm">AA</div>
                    <div class="flex-1">
                        <div class="font-bold text-church-dark text-sm">Agus Andrean</div>
                        <div class="text-xs text-gray-500 mt-0.5">Jemaat Biasa • Jl. Garuda No 45</div>
                    </div>
                </div>
                
                <div class="absolute inset-0 bg-gradient-to-t from-white via-white/40 to-transparent flex items-end justify-center pb-2 pointer-events-none">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
