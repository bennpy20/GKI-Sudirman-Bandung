@extends('components.layout')

@section('title')
    GKI Sudirman - {{ $title }}
@endsection

@section('content')
<div>
    <div class="mb-10">
        <h2 class="text-3xl font-serif mb-2">{{ $title }}</h2>
        <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Dummy Data Items -->
        <div class="bg-white rounded-3xl overflow-hidden card-shadow border border-black/5 flex flex-col h-full">
            <img src="https://picsum.photos/seed/church1/800/600" class="h-48 w-full object-cover">
            <div class="p-6 flex flex-col flex-grow">
                <span class="text-[10px] font-bold uppercase tracking-widest text-church-gold mb-2 block">10 Maret 2026</span>
                <h3 class="text-xl font-serif mb-3">Kegiatan Paskah 2026</h3>
                <p class="text-sm text-church-dark/60 mb-6 flex-grow">Mari bergabung dalam ibadah Paskah dan berbagai kegiatan menarik lainnya yang akan diadakan pada pertengahan bulan depan.</p>
                <a href="{{ route('warta_' . $category . '.show', 1) }}" class="block text-center w-full py-3 bg-church-warm/30 rounded-xl text-xs font-bold mt-auto hover:bg-church-gold hover:text-white transition-colors">
                    Lihat Detail
                </a>
            </div>
        </div>

        <div class="bg-white rounded-3xl overflow-hidden card-shadow border border-black/5 flex flex-col h-full">
            <img src="https://picsum.photos/seed/church2/800/600" class="h-48 w-full object-cover">
            <div class="p-6 flex flex-col flex-grow">
                <span class="text-[10px] font-bold uppercase tracking-widest text-church-gold mb-2 block">15 Maret 2026</span>
                <h3 class="text-xl font-serif mb-3">Rapat Jemaat Tahunan</h3>
                <p class="text-sm text-church-dark/60 mb-6 flex-grow">Mengundang seluruh anggota sidi untuk hadir dalam rapat evaluasi dan perencanaan tahunan gereja kita.</p>
                <a href="{{ route('warta_' . $category . '.show', 2) }}" class="block text-center w-full py-3 bg-church-warm/30 rounded-xl text-xs font-bold mt-auto hover:bg-church-gold hover:text-white transition-colors">
                    Lihat Detail
                </a>
            </div>
        </div>

        <div class="bg-white rounded-3xl overflow-hidden card-shadow border border-black/5 flex flex-col h-full">
            <img src="https://picsum.photos/seed/church3/800/600" class="h-48 w-full object-cover">
            <div class="p-6 flex flex-col flex-grow">
                <span class="text-[10px] font-bold uppercase tracking-widest text-church-gold mb-2 block">20 Maret 2026</span>
                <h3 class="text-xl font-serif mb-3">Persekutuan Pemuda</h3>
                <p class="text-sm text-church-dark/60 mb-6 flex-grow">Temu kangen dan ibadah padang bersama seluruh pemuda-pemudi GKI Sudirman.</p>
                <a href="{{ route('warta_' . $category . '.show', 3) }}" class="block text-center w-full py-3 bg-church-warm/30 rounded-xl text-xs font-bold mt-auto hover:bg-church-gold hover:text-white transition-colors">
                    Lihat Detail
                </a>
            </div>
        </div>
    </div>
</div>
@endsection