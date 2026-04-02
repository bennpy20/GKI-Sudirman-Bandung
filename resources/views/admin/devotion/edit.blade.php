@extends('components.admin.layout')

@section('page_title', 'Kelola Renungan Harian')

@section('title', 'Admin - Renungan Harian')

@section('content')
<div class="mb-8 relative z-10">
    <a href="{{ route('admin.devotion.index') }}" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
        <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </div>
        Kembali
    </a>
    <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Sunting Data Renungan Harian</h2>
</div>
<form action="{{ route('admin.devotion.update', $devotion->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 gap-8 pb-24">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50">
                    <h3 class="text-lg font-bold text-church-dark flex items-center gap-2">
                        Data Renungan Harian
                    </h3>
                </div>
                <div class="p-6 md:p-8 space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Judul Renungan <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $devotion->title) }}" required class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nats Alkitab <span class="text-red-500">*</span></label>
                        <input type="text" name="bible_verse" value="{{ old('bible_verse', $devotion->bible_verse) }}" required placeholder="Tuliskan nats Alkitab.." class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                        @error('bible_verse')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Penulis/Sumber <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="text" name="author" value="{{ old('author', $devotion->author) }}" required placeholder="Tuliskan penulis/sumber.." class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                                @error('author')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Kategori Pembaca <span class="text-red-500">*</span></label>
                            <select name="category" value="{{ old('category', $devotion->category) }}" required class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark appearance-none font-medium">
                                <option value="" disabled selected>Pilih Kategori</option>
                                <option value="1" {{ old('category', $devotion->category) == '1' ? 'selected' : '' }}>Dewasa</option>
                                <option value="2" {{ old('category', $devotion->category) == '2' ? 'selected' : '' }}>Remaja/Pemuda</option>
                                <option value="3" {{ old('category', $devotion->category) == '3' ? 'selected' : '' }}>Anak Sekolah Minggu</option>
                                <option value="4" {{ old('category', $devotion->category) == '4' ? 'selected' : '' }}>Usia Indah</option>
                            </select>
                            @error('category')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 flex justify-between">
                            <span>Isi Renungan <span class="text-red-500">*</span></span>
                        </label>
                        <textarea name="content" required rows="15" class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium leading-relaxed resize-y">{{ old('content', $devotion->content) }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed bottom-0 left-0 md:left-64 right-0 p-4 lg:p-6 bg-white/90 backdrop-blur-md border-t border-gray-200/60 z-30 flex justify-end gap-3 shadow-[0_-10px_40px_rgba(0,0,0,0.05)] transition-all">
        <a href="{{ route('admin.devotion.index') }}" class="px-5 lg:px-6 py-2.5 lg:py-3 bg-white border border-gray-300 rounded-xl text-gray-700 font-bold hover:bg-gray-50 transition-colors text-sm lg:text-base">
            Batalkan
        </a>
        <button type="submit" class="cursor-pointer px-6 lg:px-8 py-2.5 lg:py-3 bg-gradient-to-r from-church-gold to-yellow-600 rounded-xl text-church-dark font-bold hover:from-yellow-500 hover:to-yellow-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm lg:text-base flex items-center gap-2">
            <i class="fas fa-save"></i>Perbarui Renungan Harian
        </button>
    </div>
</form>
@endsection
