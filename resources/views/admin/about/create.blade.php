@extends('components.admin.layout')
@section('page_title', 'Tambah Informasi')

@section('content')
<!-- Header -->
<div class="mb-8 relative z-10">
    <a href="{{ route('admin.about.index') }}" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
        <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </div>
        Kembali ke Tentang Gereja
    </a>
    <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Buat Profil / Informasi Baru</h2>
    <p class="text-sm text-gray-500 font-sans mt-2 flex items-center gap-2">
        <i class="fas fa-plus-circle text-church-gold"></i> Tambahkan poin penting seperti visi, misi, atau tema tahunan.
    </p>
</div>

<form action="{{ route('admin.about.store') }}" method="POST">
    @csrf
    
    <div class="max-w-4xl pb-32">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50">
                <h3 class="text-lg font-bold text-church-dark flex items-center gap-2">
                    <i class="fas fa-file-alt text-church-gold"></i> Detail Informasi
                </h3>
            </div>
            
            <div class="p-6 md:p-8 space-y-6 flex flex-col items-center">
                <!-- Illustration -->
                <div class="w-32 h-32 rounded-full bg-church-warm/30 flex items-center justify-center border border-church-gold/20 mb-2">
                    <i class="fas fa-monument text-5xl text-church-gold"></i>
                </div>
                
                <div class="w-full">
                    <label class="block text-sm font-bold text-gray-700 mb-2 mt-4 text-center md:text-left">Label Informasi / Nama <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Tema Setahun (2026)" class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium placeholder-gray-400 text-center md:text-left text-lg">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="w-full">
                    <label class="block text-sm font-bold text-gray-700 mb-2 text-center md:text-left flex justify-between">
                        <span>Deskripsi Lengkap <span class="text-red-500">*</span></span>
                    </label>
                    <textarea name="description" required rows="10" placeholder="Tuliskan isi keterangan mengenai profil ini selengkapnya di sini..." class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium leading-relaxed resize-y">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Highlight Toggle -->
                {{-- <div class="w-full bg-gray-50 rounded-xl p-5 border border-gray-200 flex items-center justify-between">
                    <div>
                        <h4 class="font-bold text-church-dark">Tandai Sebagai Sorotan Penuh?</h4>
                        <p class="text-xs text-gray-500 mt-1">Membuat tampilan kartu item ini menjadi gelap dan elegan seperti profil eksklusif.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-church-gold/50 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-church-dark"></div>
                    </label>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Sticky Footer Actions -->
    <div class="fixed bottom-0 left-0 md:left-64 right-0 p-4 lg:p-6 bg-white/90 backdrop-blur-md border-t border-gray-200/60 z-30 flex justify-end gap-3 shadow-[0_-10px_40px_rgba(0,0,0,0.05)] transition-all">
        <a href="{{ route('admin.about.index') }}" class="px-5 lg:px-6 py-2.5 lg:py-3 bg-white border border-gray-300 rounded-xl text-gray-700 font-bold hover:bg-gray-50 transition-colors text-sm lg:text-base">
            Batalkan
        </a>
        <button type="submit" class="px-6 lg:px-8 py-2.5 lg:py-3 bg-gradient-to-r from-church-gold to-yellow-600 rounded-xl text-church-dark font-bold hover:from-yellow-500 hover:to-yellow-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm lg:text-base flex items-center gap-2">
            <i class="fas fa-check"></i> Simpan Profil
        </button>
    </div>
</form>
@endsection
