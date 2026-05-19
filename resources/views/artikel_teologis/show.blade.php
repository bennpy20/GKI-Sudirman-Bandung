@extends('components.layout')

@section('title')
    GKI Sudirman - Detail Artikel
@endsection

@section('content')
<div class="w-full mx-auto max-w-4xl">
    <a href="{{ route('artikel_teologis.index') }}" class="inline-flex items-center gap-2 text-church-gold font-bold mb-8 hover:gap-3 transition-all">
        <svg class="w-5 h-5 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        Kembali ke Daftar
    </a>
    <div class="bg-white p-10 rounded-[40px] card-shadow border border-black/5">
        <span class="text-church-gold font-bold text-xs uppercase tracking-widest mb-4 block">
            <span>Teologis</span> • <span>20 Februari 2026</span>
        </span>
        <h1 class="text-4xl md:text-5xl font-serif mb-6 leading-tight">Memahami Kasih Karunia</h1>
        <div class="flex items-center gap-2 text-sm opacity-50 italic mb-10 pb-6 border-b border-black/5">
            Oleh: <span>Pdt. Yohanes</span>
        </div>
        <div class="text-church-dark/80 text-lg leading-relaxed space-y-6 whitespace-pre-wrap font-serif">
            Kasih karunia adalah konsep sentral dalam iman Kristen. Seringkali kita terjebak dalam pemikiran bahwa kita harus 'layak' untuk menerima kasih Tuhan. Namun, esensi dari kasih karunia adalah pemberian yang tidak layak kita terima, namun diberikan secara cuma-cuma oleh Allah melalui Kristus.
            
            Dalam pelayanan kita sehari-hari, sangat mudah untuk kembali mengandalkan kekuatan sendiri dan jatuh pada jebakan legalisme. Kita lupa bahwa hidup Kristen dimulai dengan kasih karunia, dijalani dengan kasih karunia, dan akan disempurnakan oleh kasih karunia.
        </div>
    </div>
</div>
@endsection
