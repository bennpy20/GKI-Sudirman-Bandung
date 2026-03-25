@extends('components.admin.layout')
@section('page_title', 'Dashboard')

@section('content')
<!-- Welcome Header -->
<div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
        <h2 class="text-3xl font-serif font-bold text-church-dark">Selamat Datang, Admin!</h2>
        <p class="text-sm text-gray-500 mt-2 font-sans flex items-center gap-2">
            Ringkasan informasi dan aktivitas pelayanan GKI Sudirman hari ini.
        </p>
    </div>
    <div class="flex items-center gap-3 px-4 py-2.5 bg-white border border-gray-200 rounded-xl shadow-sm w-max">
        <i class="fas fa-calendar-day text-church-gold"></i>
        <span class="text-sm font-bold text-gray-700">Jumat, 20 Maret 2026</span>
    </div>
</div>

<!-- Stats Overview Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stat 1: Total Jemaat -->
    <div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 p-6 relative overflow-hidden group hover:border-blue-200 transition-colors">
        <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-blue-50 to-blue-100 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-500 ease-out"></div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl shadow-sm border border-blue-100">
                    <i class="fas fa-users"></i>
                </div>
                <span class="inline-flex items-center gap-1 text-xs font-bold text-green-600 bg-green-50 px-2 py-1 rounded-md">
                    <i class="fas fa-arrow-up"></i> 12%
                </span>
            </div>
            <h3 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-1">Total Jemaat</h3>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-serif font-bold text-church-dark">1,254</span>
                <span class="text-sm font-medium text-gray-400">Jiwa</span>
            </div>
        </div>
    </div>

    <!-- Stat 2: Anggota Aktif -->
    <div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 p-6 relative overflow-hidden group hover:border-green-200 transition-colors">
        <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-green-50 to-green-100 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-500 ease-out"></div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center text-xl shadow-sm border border-green-100">
                    <i class="fas fa-user-check"></i>
                </div>
                <span class="text-xs font-bold text-gray-400">Bulan ini</span>
            </div>
            <h3 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-1">Anggota Aktif</h3>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-serif font-bold text-church-dark">980</span>
                <span class="text-sm font-medium text-gray-400">Jiwa</span>
            </div>
        </div>
    </div>

    <!-- Stat 3: Pelayan & Majelis -->
    <div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 p-6 relative overflow-hidden group hover:border-purple-200 transition-colors">
        <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-purple-50 to-purple-100 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-500 ease-out"></div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl shadow-sm border border-purple-100">
                    <i class="fas fa-pray"></i>
                </div>
                <span class="text-xs font-bold text-gray-400">Terjadwal</span>
            </div>
            <h3 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-1">Majelis & Pelayan</h3>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-serif font-bold text-church-dark">124</span>
                <span class="text-sm font-medium text-gray-400">Orang</span>
            </div>
        </div>
    </div>

    <!-- Stat 4: Ibadah Terdekat -->
    <div class="bg-gradient-to-br from-church-gold to-yellow-600 rounded-2xl shadow-[0_4px_20px_rgba(197,160,89,0.3)] border border-yellow-500/50 p-6 relative overflow-hidden group">
        <div class="absolute -right-6 -top-6 w-24 h-24 bg-white/10 rounded-full mix-blend-overlay group-hover:scale-150 transition-transform duration-500 ease-out"></div>
        <div class="relative z-10 text-church-dark">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-church-dark/10 flex items-center justify-center text-xl shadow-sm">
                    <i class="fas fa-church"></i>
                </div>
                <span class="text-xs font-bold bg-white/20 px-2 py-1 rounded-md backdrop-blur-sm">2 Minggu Depan</span>
            </div>
            <h3 class="text-church-dark/80 text-sm font-bold uppercase tracking-wider mb-1">Ibadah Terdekat</h3>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-serif font-bold text-church-dark leading-tight">Minggu Paskah</span>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 xl:grid-cols-3 gap-8 pb-32">
    <!-- Left Column: Upcoming Worships & Activities (Spans 2 columns on extra large screens) -->
    <div class="xl:col-span-2 space-y-8">
        <!-- Upcoming Worship -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                <h3 class="font-bold text-church-dark flex items-center gap-2">
                    <i class="fas fa-calendar-alt text-church-gold"></i> Agenda Ibadah Mendatang
                </h3>
                <a href="{{ route('admin.worship.index') }}" class="text-xs font-bold text-blue-600 hover:text-blue-800 transition-colors">Lihat Semua</a>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <!-- Item 1 -->
                    <div class="flex flex-col md:flex-row gap-4 p-4 rounded-xl border border-gray-100 hover:border-church-gold/30 hover:shadow-md transition-all bg-white group">
                        <div class="flex-shrink-0 w-full md:w-32 py-3 bg-red-50 text-red-700 rounded-lg border border-red-100 flex flex-col items-center justify-center text-center">
                            <span class="text-sm font-bold uppercase tracking-wider">Minggu</span>
                            <span class="text-3xl font-serif font-bold leading-none my-1">22</span>
                            <span class="text-xs font-medium opacity-80">Maret 2026</span>
                        </div>
                        <div class="flex-1 flex flex-col justify-between">
                            <div>
                                <div class="flex flex-wrap items-center gap-2 mb-2">
                                    <span class="inline-flex py-0.5 px-2 rounded bg-purple-100 text-purple-700 text-[10px] font-bold border border-purple-200 uppercase tracking-wider">Prapaskah 5</span>
                                    <span class="text-xs text-gray-500 font-medium"><i class="far fa-clock"></i> 07:00 & 10:00 WIB</span>
                                </div>
                                <h4 class="text-lg font-serif font-bold text-church-dark group-hover:text-church-gold transition-colors">Kasih Karunia yang Mengubah</h4>
                                <p class="text-sm text-gray-500 mt-1">Pdt. Simaremare (GKI Sudirman)</p>
                            </div>
                            <div class="mt-3 pt-3 border-t border-gray-50 flex items-center gap-3">
                                <div class="flex -space-x-2">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 border-2 border-white flex items-center justify-center text-xs font-bold text-blue-700" title="Pemusik">M</div>
                                    <div class="w-8 h-8 rounded-full bg-green-100 border-2 border-white flex items-center justify-center text-xs font-bold text-green-700" title="Penyanyi">P</div>
                                    <div class="w-8 h-8 rounded-full bg-yellow-100 border-2 border-white flex items-center justify-center text-xs font-bold text-yellow-700" title="Penyambut">P</div>
                                </div>
                                <span class="text-xs text-gray-400 font-medium">12 Pelayan Terjadwal</span>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="flex flex-col md:flex-row gap-4 p-4 rounded-xl border border-gray-100 hover:border-church-gold/30 hover:shadow-md transition-all bg-white group">
                        <div class="flex-shrink-0 w-full md:w-32 py-3 bg-gray-50 text-gray-600 rounded-lg border border-gray-200 flex flex-col items-center justify-center text-center">
                            <span class="text-sm font-bold uppercase tracking-wider">Jumat</span>
                            <span class="text-3xl font-serif font-bold leading-none my-1">27</span>
                            <span class="text-xs font-medium opacity-80">Maret 2026</span>
                        </div>
                        <div class="flex-1 flex flex-col justify-between">
                            <div>
                                <div class="flex flex-wrap items-center gap-2 mb-2">
                                    <span class="inline-flex py-0.5 px-2 rounded bg-gray-900 text-white text-[10px] font-bold border border-gray-700 uppercase tracking-wider">Jumat Agung</span>
                                    <span class="text-xs text-gray-500 font-medium"><i class="far fa-clock"></i> 17:00 WIB</span>
                                </div>
                                <h4 class="text-lg font-serif font-bold text-church-dark group-hover:text-church-gold transition-colors">Pengorbanan Sempurna</h4>
                                <p class="text-sm text-gray-500 mt-1">Pdt. Em. Samuel (Tamu)</p>
                            </div>
                            <div class="mt-3 pt-3 border-t border-gray-50 flex items-center justify-between text-xs text-red-500 font-bold">
                                <span><i class="fas fa-exclamation-triangle mr-1"></i> Penatalayan Belum Lengkap</span>
                                <a href="#" class="px-3 py-1 bg-red-50 text-red-600 border border-red-100 rounded-lg hover:bg-red-100 transition-colors">Lengkapi Jadwal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Recent Activities & Announcements -->
    <div class="xl:col-span-1 space-y-8">
        <!-- Announcements Widget -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                <h3 class="font-bold text-church-dark flex items-center gap-2">
                    <i class="fas fa-bullhorn text-church-gold"></i> Warta Aktif
                </h3>
            </div>
            <div class="p-6">
                <div class="space-y-5">
                    <!-- Warta Item -->
                    <div class="flex gap-3 items-start border-b border-gray-50 pb-4 last:border-0 last:pb-0">
                        <div class="mt-1 w-2 h-2 rounded-full bg-blue-500 flex-shrink-0 animate-pulse"></div>
                        <div>
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block mb-0.5">Diakonia</span>
                            <a href="#" class="font-bold text-sm text-church-dark hover:text-church-gold transition-colors leading-tight block mb-1">Aksi Donor Darah Jemaat 2026</a>
                            <span class="text-xs text-gray-500">Berakhir 15 Mei</span>
                        </div>
                    </div>
                    <!-- Warta Item -->
                    <div class="flex gap-3 items-start border-b border-gray-50 pb-4 last:border-0 last:pb-0">
                        <div class="mt-1 w-2 h-2 rounded-full bg-purple-500 flex-shrink-0"></div>
                        <div>
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block mb-0.5">Pembinaan</span>
                            <a href="#" class="font-bold text-sm text-church-dark hover:text-church-gold transition-colors leading-tight block mb-1">Penelaahan Alkitab (PA) Wilayah II</a>
                            <span class="text-xs text-gray-500">Berakhir besok</span>
                        </div>
                    </div>
                </div>
                <a href="{{ route('admin.announcement.index') }}" class="block text-center w-full py-2.5 mt-4 text-xs font-bold text-gray-600 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">Kelola Semua Warta</a>
            </div>
        </div>
        
        <!-- Renungan Widget -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden relative">
            <div class="absolute inset-0 bg-gradient-to-br from-church-warm/10 to-transparent pointer-events-none"></div>
            <div class="p-6 relative z-10">
                <h3 class="text-xs font-bold text-church-gold uppercase tracking-widest mb-1">Renungan Harian Terkini</h3>
                <h4 class="text-xl font-serif font-bold text-church-dark leading-tight mb-2">Tuhan Penolong yang Setia</h4>
                <p class="text-sm text-gray-600 italic mb-4 line-clamp-2">"Aku melayangkan mataku ke gunung-gunung; dari manakah akan datang pertolonganku?..."</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-gray-500"><i class="fas fa-user-circle mr-1"></i> Pdt. Yohanes</span>
                    <a href="#" class="text-xs font-bold text-blue-600 hover:underline">Baca Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
