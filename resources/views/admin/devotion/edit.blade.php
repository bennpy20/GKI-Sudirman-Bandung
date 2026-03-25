@extends('components.admin.layout')
@section('page_title', 'Edit Renungan')

@section('content')
<!-- Header -->
<div class="mb-8 relative z-10">
    <a href="#" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
        <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </div>
        Kembali ke Detail Renungan
    </a>
    <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Revisi Artikel Renungan</h2>
    <p class="text-sm text-gray-500 font-sans mt-2 flex items-center gap-2">
        <i class="fas fa-edit text-church-gold"></i> Koreksi konten renungan "Tuhan Penolong yang Setia".
    </p>
</div>

<form action="#" method="POST">
    @csrf
    @method('PUT')
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 pb-32">
        <!-- Main Form Column -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50">
                    <h3 class="text-lg font-bold text-church-dark flex items-center gap-2">
                        <i class="fas fa-book-open text-church-gold"></i> Naskah Renungan
                    </h3>
                </div>
                
                <div class="p-6 space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Judul Artikel / Renungan <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="Tuhan Penolong yang Setia" required class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium placeholder-gray-400">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Sumber Bacaan Alkitab <span class="text-red-500">*</span></label>
                            <input type="text" name="bible_verse" value="Mazmur 121:1-8" required class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Penulis / Kontributor <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="text" name="author" value="Pdt. Yohanes" required class="w-full pl-11 pr-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                                <i class="fas fa-pen-nib absolute left-4 top-3.5 text-gray-400 pointer-events-none"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 flex justify-between">
                            <span>Isi Renungan <span class="text-red-500">*</span></span>
                        </label>
                        <textarea name="content" required rows="15" class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium leading-relaxed resize-y">Aku melayangkan mataku ke gunung-gunung; dari manakah akan datang pertolonganku?

Seringkali dalam hidup ini kita merasa seperti berada di lembah kekelaman, terdesak oleh berbagai masalah dan tantangan yang menjulang tinggi seperti gunung di hadapan kita. Namun, Pemazmur mengingatkan kita bahwa pertolongan kita bukan datang dari gunung-gunung itu, melainkan dari TUHAN yang menjadikan langit dan bumi.

Jadikanlah renungan ini sebagai pengingat di pagi hari bahwa Tuhan tidak pernah terlelap maupun tertidur. Ia setia menjaga umat-Nya kapanpun dan dimanapun kita berada.</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Config Column -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-6">
                <div class="px-6 py-5 border-b border-gray-50 bg-church-warm/20">
                    <h3 class="text-lg font-bold text-church-dark flex items-center gap-2">
                        <i class="fas fa-tags text-church-gold"></i> Metadata
                    </h3>
                </div>
                
                <div class="p-6 space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Segmentasi Pembaca <span class="text-red-500">*</span></label>
                        <p class="text-xs text-gray-500 mb-3">Tentukan kepada strata usia apa renungan ini difokuskan.</p>
                        <select name="category" required class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark appearance-none font-medium">
                            <option value="Umum" selected>Umum (Semua Usia)</option>
                            <option value="Anak">Anak-anak Sekolah Minggu</option>
                            <option value="Remaja">Remaja Tunas</option>
                            <option value="Pemuda">Pemuda (Youth)</option>
                            <option value="Lansia">Lansia (Lanjut Usia)</option>
                        </select>
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
            <i class="fas fa-save"></i> Perbarui Renungan
        </button>
    </div>
</form>
@endsection
