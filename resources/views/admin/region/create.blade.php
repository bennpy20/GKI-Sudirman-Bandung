@extends('components.admin.layout')
@section('page_title', 'Tambah Wilayah')

@section('content')
<!-- Header -->
<div class="mb-8">
    <a href="#" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
        <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </div>
        Kembali ke Daftar Wilayah
    </a>
    <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Buat Wilayah Baru</h2>
    <p class="text-sm text-gray-500 font-sans mt-2 flex items-center gap-2">
        <i class="fas fa-map-marker-alt text-church-gold"></i> Tambahkan rayon/wilayah baru untuk pembagian jemaat.
    </p>
</div>

<form action="#" method="POST">
    @csrf
    
    <div class="max-w-3xl">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 md:px-8 py-5 border-b border-gray-50 bg-church-warm/20">
                <h3 class="text-xl font-serif font-bold text-church-dark flex items-center gap-3">
                    <i class="fas fa-map-marked-alt text-church-gold"></i>
                    Informasi Wilayah
                </h3>
            </div>
            
            <div class="p-6 md:p-8 space-y-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Wilayah / Rayon <span class="text-red-500">*</span></label>
                    <input type="text" name="name" required placeholder="Contoh: Rayon Galilea" class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all focus:bg-white text-church-dark font-medium">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Jangkauan</label>
                    <textarea name="description" rows="4" placeholder="Sebutkan detail jangkauan jalan atau kecamatan yang masuk ke dalam wilayah ini..." class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all focus:bg-white text-church-dark resize-none font-medium text-sm leading-relaxed"></textarea>
                    <p class="text-xs text-gray-400 mt-2 font-medium"><i class="fas fa-info-circle"></i> Deskripsi ini untuk memudahkan pemetaan penempatan jemaat.</p>
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
            <i class="fas fa-save"></i> Simpan Wilayah
        </button>
    </div>
</form>

<!-- Spacer for fixed footer -->
<div class="h-24"></div>
@endsection
