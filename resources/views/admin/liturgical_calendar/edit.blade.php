@extends('components.admin.layout')
@section('page_title', 'Edit Pekan Liturgi')

@section('content')
<!-- Header -->
<div class="mb-8">
    <a href="#" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
        <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </div>
        Kembali ke Kalender
    </a>
    <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Perbarui Pekan Liturgi</h2>
    <p class="text-sm text-gray-500 font-sans mt-2 flex items-center gap-2">
        <i class="fas fa-edit text-church-gold"></i> Ubah detail untuk Minggu Prapaskah 1.
    </p>
</div>

<form action="#" method="POST">
    @csrf
    @method('PUT')
    
    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 md:px-8 py-5 border-b border-gray-50 bg-church-warm/20">
                <h3 class="text-xl font-serif font-bold text-church-dark flex items-center gap-3">
                    <i class="fas fa-palette text-church-gold"></i>
                    Informasi Liturgi
                </h3>
            </div>
            
            <div class="p-6 md:p-8 space-y-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Pekan Liturgi <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="Minggu Prapaskah 1" required class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all focus:bg-white text-church-dark font-medium">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Warna Liturgi (Peristiwa) <span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <!-- Option 1 -->
                        <label class="cursor-pointer">
                            <input type="radio" name="color" value="Ungu" class="peer sr-only" checked>
                            <div class="p-4 rounded-xl border-2 border-transparent bg-white shadow-sm ring-1 ring-gray-200 peer-checked:border-purple-500 peer-checked:ring-purple-500 peer-checked:bg-purple-50 transition-all text-center">
                                <div class="w-8 h-8 rounded-full bg-purple-600 mx-auto mb-2 shadow-sm"></div>
                                <span class="text-sm font-bold text-gray-700">Ungu</span>
                            </div>
                        </label>
                        <!-- Option 2 -->
                        <label class="cursor-pointer">
                            <input type="radio" name="color" value="Hijau" class="peer sr-only">
                            <div class="p-4 rounded-xl border-2 border-transparent bg-white shadow-sm ring-1 ring-gray-200 peer-checked:border-green-500 peer-checked:ring-green-500 peer-checked:bg-green-50 transition-all text-center">
                                <div class="w-8 h-8 rounded-full bg-green-500 mx-auto mb-2 shadow-sm"></div>
                                <span class="text-sm font-bold text-gray-700">Hijau</span>
                            </div>
                        </label>
                        <!-- Option 3 -->
                        <label class="cursor-pointer">
                            <input type="radio" name="color" value="Merah" class="peer sr-only">
                            <div class="p-4 rounded-xl border-2 border-transparent bg-white shadow-sm ring-1 ring-gray-200 peer-checked:border-red-500 peer-checked:ring-red-500 peer-checked:bg-red-50 transition-all text-center">
                                <div class="w-8 h-8 rounded-full bg-red-600 mx-auto mb-2 shadow-sm"></div>
                                <span class="text-sm font-bold text-gray-700">Merah</span>
                            </div>
                        </label>
                        <!-- Option 4 -->
                        <label class="cursor-pointer">
                            <input type="radio" name="color" value="Putih" class="peer sr-only">
                            <div class="p-4 rounded-xl border-2 border-transparent bg-white shadow-sm ring-1 ring-gray-200 peer-checked:border-gray-400 peer-checked:ring-gray-400 peer-checked:bg-gray-100 transition-all text-center">
                                <div class="w-8 h-8 rounded-full bg-white border border-gray-300 mx-auto mb-2 shadow-sm"></div>
                                <span class="text-sm font-bold text-gray-700">Putih</span>
                            </div>
                        </label>
                        <!-- Option 5 -->
                        <label class="cursor-pointer">
                            <input type="radio" name="color" value="Hitam" class="peer sr-only">
                            <div class="p-4 rounded-xl border-2 border-transparent bg-white shadow-sm ring-1 ring-gray-200 peer-checked:border-gray-800 peer-checked:ring-gray-800 peer-checked:bg-gray-200 transition-all text-center">
                                <div class="w-8 h-8 rounded-full bg-gray-900 mx-auto mb-2 shadow-sm"></div>
                                <span class="text-sm font-bold text-gray-700">Hitam</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sticky Footer Actions -->
    <div class="fixed bottom-0 left-0 md:left-64 right-0 p-4 lg:p-6 bg-white/90 backdrop-blur-md border-t border-gray-200/60 z-30 flex justify-end gap-3 shadow-[0_-10px_40px_rgba(0,0,0,0.05)] transition-all">
        <a href="#" class="px-5 lg:px-6 py-2.5 lg:py-3 bg-white border border-gray-300 rounded-xl text-gray-700 font-bold hover:bg-gray-50 transition-colors text-sm lg:text-base">
            Batalkan
        </a>
        <button type="submit" class="px-6 lg:px-8 py-2.5 lg:py-3 bg-gradient-to-r from-church-gold to-yellow-600 rounded-xl text-church-dark font-bold hover:from-yellow-500 hover:to-yellow-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm lg:text-base flex items-center gap-2">
            <i class="fas fa-save"></i> Perbarui Liturgi
        </button>
    </div>
</form>

<!-- Spacer for fixed footer -->
<div class="h-24"></div>
@endsection
