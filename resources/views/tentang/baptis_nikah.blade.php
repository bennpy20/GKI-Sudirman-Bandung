@extends('components.layout')

@section('title')
    GKI Sudirman - Baptis & Nikah
@endsection

@section('content')
<div class="mb-10">
    <h2 class="text-3xl font-serif mb-2">Baptis & Nikah</h2>
    <p class="text-church-dark/50 italic">Informasi sakramen baptisan dan pemberkatan nikah</p>
    <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
</div>
<div class="max-w-4xl mx-auto space-y-4">
    <div class="bg-white rounded-2xl border border-black/5 overflow-hidden card-shadow" x-data="{ open: true }">
        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-church-warm/20 transition-colors">
            <span class="font-serif text-xl">Sakramen Baptisan Kudus</span>
            <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>
        <div x-show="open" class="p-6 pt-0 text-church-dark/70 leading-relaxed border-t border-black/5 mt-2">
            <ol class="list-decimal pl-5 space-y-2">
                <li>
                    <strong>Baptis Anak:</strong><br>
                    Persyaratan: Fotokopi akta kelahiran anak, surat nikah orang tua, dan salah satu orang tua adalah anggota GKI Sudirman.
                </li>
                <li>
                    <strong>Baptis Dewasa/Sidi:</strong><br>
                    Persyaratan: Mengikuti kelas katekisasi yang diadakan oleh gereja selama kurang lebih 9 bulan.
                </li>
            </ol>
        </div>
    </div>
    <div class="bg-white rounded-2xl border border-black/5 overflow-hidden card-shadow" x-data="{ open: true }">
        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-church-warm/20 transition-colors">
            <span class="font-serif text-xl">Peneguhan & Pemberkatan Nikah</span>
            <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>
        <div x-show="open" class="p-6 pt-0 text-church-dark/70 leading-relaxed border-t border-black/5 mt-2">
            Prosedur: Mengisi formulir pendaftaran minimal 3 bulan sebelum hari H dan mengikuti bina pranikah.
        </div>
    </div>
</div>
@endsection
