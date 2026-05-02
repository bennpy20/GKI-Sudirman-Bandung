@extends('components.admin.layout')
@section('page_title', 'Dashboard')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
        <h2 class="text-3xl font-bold text-church-dark">Selamat Datang, Admin!</h2>
        <p class="text-sm text-gray-500 mt-2 font-sans flex items-center gap-2">
            Ringkasan informasi dan aktivitas pelayanan GKI Sudirman ada di sini.
        </p>
    </div>
    <div class="flex items-center gap-3 px-4 py-2.5 bg-white border border-gray-200 rounded-xl shadow-sm w-max">
        <i class="fas fa-calendar-day text-church-gold"></i>
        <span class="text-sm font-bold text-gray-700">{{ $date_now }}</span>
    </div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 p-6 relative overflow-hidden group transition-colors">
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl shadow-sm border border-blue-100">
                    <i class="fas fa-address-card"></i>
                </div>
            </div>
            <h3 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-1">Total Jemaat</h3>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-bold text-church-dark">{{ number_format($members->count(), 0, ',', '.') }}</span>
                <span class="text-sm font-medium text-gray-400">Orang</span>
                <div class="flex items-center gap-6 px-6 text-xs font-bold">
                    <span class="flex items-center gap-1 text-green-600">
                        <i class="fas fa-circle text-green-500 text-[6px]"></i>
                        Aktif: {{ number_format($members->where('is_active', 1)->count(), 0, ',', '.') }}
                    </span>
                    <span class="flex items-center gap-1 text-red-600">
                        <i class="fas fa-circle text-red-500 text-[6px]"></i>
                        Non-Aktif: {{ number_format($members->where('is_active', 0)->count(), 0, ',', '.') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 p-6 relative overflow-hidden group transition-colors">
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center text-xl shadow-sm border border-green-100">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
            </div>
            <h3 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-1">Total Rayon</h3>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-bold text-church-dark">{{ number_format($regions->count(), 0, ',', '.') }}</span>
                <span class="text-sm font-medium text-gray-400">Wilayah</span>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 p-6 relative overflow-hidden group transition-colors">
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl shadow-sm border border-purple-100">
                    <i class="fas fa-pray"></i>
                </div>
            </div>
            <h3 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-1">Total Komisi</h3>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-bold text-church-dark">{{ number_format($commissions->count(), 0, ',', '.') }}</span>
                <span class="text-sm font-medium text-gray-400">Komisi</span>
            </div>
        </div>
    </div>
</div>
<div class="grid grid-cols-1 xl:grid-cols-3 gap-8 pb-24">
    <div class="xl:col-span-2 space-y-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                <h3 class="font-bold text-church-dark flex items-center gap-2">
                    Jadwal Ibadah Mendatang
                </h3>
                <a href="{{ route('admin.worship.index') }}" class="text-xs font-bold text-church-dark hover:text-church-gold transition-colors">Lihat Semua</a>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @forelse($worships as $worship)
                    <a href="{{ route('admin.worship.show', $worship->id) }}" class="block">
                        <div class="flex flex-col md:flex-row gap-4 p-4 rounded-xl border border-gray-100 hover:border-church-gold/30 hover:shadow-md transition-all bg-white group">
                            @php
                                $isSunday = $worship->formatted_day === 'Minggu';
                                $bgClass = $isSunday 
                                    ? 'bg-red-50 text-red-700 border-red-100'
                                    : 'bg-gray-50 text-gray-700 border-gray-200';
                            @endphp
                            <div class="flex-shrink-0 w-full md:w-32 py-3 rounded-lg border flex flex-col items-center justify-center text-center {{ $bgClass }}">
                                <span class="text-sm font-bold uppercase tracking-wider">{{ $worship->formatted_day }}</span>
                                <span class="text-3xl font-bold leading-none my-1">{{ $worship->formatted_day_num }}</span>
                                <span class="text-xs font-medium opacity-80">{{ $worship->formatted_month_year }}</span>
                            </div>
                            <div class="flex-1 flex flex-col justify-between">
                                <div>
                                    <h4 class="text-lg font-bold text-church-dark group-hover:text-church-gold transition-colors">{{ $worship->title }}</h4>
                                    <p class="text-sm text-gray-500 mt-1">{{ $worship->preachers->name }} ({{ $worship->preachers->base }})</p>
                                    <div class="flex flex-wrap items-center gap-2 mt-2">
                                        @if($worship->liturgical_calendars)
                                            @php
                                                $colors = [
                                                    'Ungu' => ['bg-purple-50 text-purple-700 border-purple-100'],
                                                    'Hijau' => ['bg-green-50 text-green-700 border-green-100'],
                                                    'Merah' => ['bg-red-50 text-red-700 border-red-100'],
                                                    'Putih' => ['bg-gray-50 text-gray-700 border-gray-200'],
                                                    'Hitam' => ['bg-gray-500 text-white border-gray-800'],
                                                ];
                                                [$colorClass] = $colors[$worship->liturgical_calendars->color] ?? ['bg-gray-50 text-gray-700 border-gray-200'];
                                            @endphp
                                        <span class="inline-flex py-1 px-2 rounded text-[10px] font-bold border uppercase tracking-wider {{ $colorClass }}">
                                            {{ $worship->liturgical_calendars->name }}
                                        </span>
                                        @endif
                                        <span class="inline-flex items-center py-1 px-2 rounded text-[10px] font-bold border bg-gray-50 text-gray-700 border-gray-200">
                                            {{ $worship->category_label }} ({{ $worship->formatted_time }})
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-3 pt-3 border-t border-gray-50 flex items-center gap-3">
                                    @if($worship->sunday_services->count() > 0)
                                        <span class="text-gray-400 text-sm">
                                            Jumlah penatalayan: {{ $worship->sunday_services->count() }} orang
                                        </span>
                                    @else
                                        <span class="text-yellow-500 text-sm font-medium">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            Belum ada penatalayan.
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                    @empty
                    <p class="text-sm text-gray-500 italic text-center py-6">Belum ada jadwal ibadah mendatang.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="xl:col-span-1 space-y-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                <h3 class="font-bold text-church-dark flex items-center gap-2">
                    Warta Berlangsung
                </h3>
            </div>
            <div class="p-6">
                <div class="space-y-5">
                    @forelse($announcements as $announcement)
                    <div class="flex gap-3 items-start border-b border-gray-50 pb-4 last:border-0 last:pb-0">
                        <div class="mt-1 w-2 h-2 rounded-full bg-church-gold flex-shrink-0"></div>
                        <div>
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block mb-0.5">{{ $announcement->category }}</span>
                            <a href="{{ route('admin.announcement.show', $announcement->id) }}" class="font-bold text-sm text-church-dark hover:text-church-gold transition-colors leading-tight block mb-1 truncate max-w-[300px]">
                                {{ $announcement->title }}
                            </a>
                            <span class="text-xs text-gray-500">Periode Warta: {{ $announcement->date_start }} - {{ $announcement->date_end }}</span>
                        </div>
                    </div>
                    @empty
                    <p class="text-sm text-gray-500 italic text-center py-6">Belum ada warta yang sedang berlangsung.</p>
                    @endforelse
                </div>
                <a href="{{ route('admin.announcement.index') }}" class="block text-center w-full py-2.5 mt-4 text-xs font-bold text-gray-600 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">Lihat Daftar Warta</a>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden relative">
            <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                <h3 class="font-bold text-church-dark flex items-center gap-2">
                    Renungan Hari Ini
                </h3>
            </div>
            <div class="p-6">
                <div class="space-y-5">
                @forelse($devotions as $devotion)
                    <div class="border-b border-gray-50 pb-3 last:border-0 last:pb-0">
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block mb-1">
                            {{ $devotion->devotionCategory }}
                        </span>
                        <h4 class="text-base font-bold text-church-dark leading-tight pb-1 truncate max-w-[300px]">
                            {{ $devotion->title }}
                        </h4>
                        <p class="text-xs text-gray-600 italic line-clamp-2 mt-1">
                            {{ Str::limit($devotion->content, 120) }}
                        </p>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-[11px] font-semibold text-gray-500">
                                <i class="fas fa-user-circle mr-2"></i>{{ $devotion->author ?? '-' }}
                            </span>
                            <a href="{{ route('admin.devotion.show', $devotion->id) }}" class="text-[11px] font-bold text-blue-600 hover:text-blue-800 transition-colors">
                                Selengkapnya..
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-500 italic text-center py-6">Belum ada renungan harian terbaru untuk ditampilkan.</p>
                @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
