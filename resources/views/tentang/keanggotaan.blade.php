@extends('components.layout')

@section('title')
    GKI Sudirman - Keanggotaan
@endsection

@section('content')
<div class="mb-10">
    <h2 class="text-3xl font-serif mb-2">Keanggotaan</h2>
    <p class="text-church-dark/50 italic">Informasi seputar keanggotaan jemaat</p>
    <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
</div>
<div class="max-w-4xl mx-auto space-y-4">
    <div class="bg-white rounded-2xl border border-black/5 overflow-hidden card-shadow" x-data="{ open: true }">
        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-church-warm/20 transition-colors">
            <span class="font-serif text-xl">Cara Menjadi Anggota (Atestasi Masuk)</span>
            <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>
        <div x-show="open" class="p-6 pt-0 text-church-dark/70 leading-relaxed border-t border-black/5 mt-2">
            Jemaat dapat mengajukan surat atestasi dari gereja asal dengan melampirkan fotokopi surat baptis/sidi dan pas foto terbaru.
        </div>
    </div>
    <div class="bg-white rounded-2xl border border-black/5 overflow-hidden card-shadow" x-data="{ open: true }">
        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-church-warm/20 transition-colors">
            <span class="font-serif text-xl">Atestasi Keluar</span>
            <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>
        <div x-show="open" class="p-6 pt-0 text-church-dark/70 leading-relaxed border-t border-black/5 mt-2">
            Bagi jemaat yang akan pindah keanggotaan, silakan mengajukan permohonan tertulis kepada Majelis Jemaat.
        </div>
    </div>
</div>
@endsection
