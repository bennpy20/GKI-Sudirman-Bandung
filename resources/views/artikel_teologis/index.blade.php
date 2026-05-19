@extends('components.layout')

@section('title')
    GKI Sudirman - Artikel Teologis
@endsection

@section('content')
<div>
    <div class="mb-10">
        <h2 class="text-3xl font-serif mb-2 capitalize">Artikel Teologis</h2>
        <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Dummy Data Items -->
        <a href="{{ route('artikel_teologis.show', 1) }}" class="block bg-white p-8 rounded-3xl card-shadow border border-black/5 cursor-pointer group hover:border-church-gold/30 transition-all">
            <span class="text-church-gold font-bold text-[10px] uppercase tracking-widest mb-3 block">
                <span>Teologis</span> • <span>20 Februari 2026</span>
            </span>
            <h3 class="text-2xl font-serif mb-4 group-hover:text-church-gold transition-colors">Memahami Kasih Karunia</h3>
            <p class="text-church-dark/60 text-sm line-clamp-4 leading-relaxed mb-6">Kasih karunia adalah konsep sentral dalam iman Kristen. Seringkali kita terjebak dalam pemikiran bahwa kita harus 'layak' untuk menerima kasih Tuhan. Namun, esensi dari kasih karunia adalah pemberian yang tidak layak kita terima, namun diberikan secara cuma-cuma oleh Allah melalui Kristus...</p>
            <div class="flex items-center justify-between pt-4 border-t border-black/5">
                <span class="text-xs italic opacity-40">Oleh: <span>Pdt. Yohanes</span></span>
                <svg class="w-5 h-5 text-church-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </div>
        </a>

        <a href="{{ route('artikel_teologis.show', 2) }}" class="block bg-white p-8 rounded-3xl card-shadow border border-black/5 cursor-pointer group hover:border-church-gold/30 transition-all">
            <span class="text-church-gold font-bold text-[10px] uppercase tracking-widest mb-3 block">
                <span>Teologis</span> • <span>12 Februari 2026</span>
            </span>
            <h3 class="text-2xl font-serif mb-4 group-hover:text-church-gold transition-colors">Makna Penderitaan</h3>
            <p class="text-church-dark/60 text-sm line-clamp-4 leading-relaxed mb-6">Bagaimana kita sebagai orang percaya memandang penderitaan? Di tengah dunia yang jatuh ini, penderitaan adalah realitas. Namun, melalui teladan Kristus, kita belajar bahwa penderitaan bukanlah akhir, melainkan jalan menuju kemuliaan yang lebih besar...</p>
            <div class="flex items-center justify-between pt-4 border-t border-black/5">
                <span class="text-xs italic opacity-40">Oleh: <span>Pdt. Maria</span></span>
                <svg class="w-5 h-5 text-church-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </div>
        </a>
    </div>
</div>
@endsection