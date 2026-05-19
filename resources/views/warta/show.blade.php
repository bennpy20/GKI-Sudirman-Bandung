@extends('components.layout')

@section('title')
    GKI Sudirman - Detail Warta
@endsection

@section('content')
<div class="w-full mx-auto max-w-4xl">
    <a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 text-church-gold font-bold mb-8 hover:gap-3 transition-all">
        <svg class="w-5 h-5 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        Kembali ke Daftar
    </a>
    <div class="bg-white rounded-[40px] card-shadow border border-black/5 overflow-hidden">
        <img src="https://picsum.photos/seed/church1/1200/600" class="w-full h-[400px] object-cover">
        <div class="p-10">
            <span class="text-church-gold font-bold text-xs uppercase tracking-widest mb-4 block">10 Maret 2026</span>
            <h1 class="text-4xl md:text-5xl font-serif mb-6 leading-tight">Kegiatan Paskah 2026</h1>
            <div class="text-church-dark/80 text-lg leading-relaxed space-y-6 whitespace-pre-wrap font-serif mt-8">
                Mari bergabung dalam ibadah Paskah dan berbagai kegiatan menarik lainnya yang akan diadakan pada pertengahan bulan depan. Kegiatan ini terbuka untuk seluruh jemaat dan simpatisan.
                
                Rangkaian kegiatan meliputi ibadah Jumat Agung, Ibadah Subuh Paskah, dan perayaan Paskah bersama. Pastikan Anda mendaftar melalui Tata Usaha gereja atau melalui link pendaftaran online.
            </div>
        </div>
    </div>
</div>
@endsection
