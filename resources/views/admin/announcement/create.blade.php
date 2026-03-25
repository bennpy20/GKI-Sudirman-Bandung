@extends('components.admin.layout')
@section('page_title', 'Buat Warta Jemaat')

@section('content')
<!-- Header -->
<div class="mb-8 relative z-10">
    <a href="{{ route('admin.worship.index') }}" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
        <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </div>
        Kembali ke Daftar Warta
    </a>
    <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Buat Warta Baru</h2>
    <p class="text-sm text-gray-500 font-sans mt-2 flex items-center gap-2">
        <i class="fas fa-bullhorn text-church-gold"></i> Publikasikan berita atau pengumuman seputar gereja.
    </p>
</div>

<form action="#" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 pb-32">
        <!-- Main Form Column -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Information Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50">
                    <h3 class="text-lg font-bold text-church-dark flex items-center gap-2">
                        <i class="fas fa-edit text-church-gold"></i> Isi Warta
                    </h3>
                </div>
                
                <div class="p-6 space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Judul Warta <span class="text-red-500">*</span></label>
                        <input type="text" name="title" required placeholder="Contoh: Aksi Donor Darah Jemaat" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium placeholder-gray-400">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 flex justify-between">
                            <span>Isi Teks Lengkap <span class="text-red-500">*</span></span>
                            <span class="text-xs text-gray-400 font-normal"><i class="fas fa-info-circle"></i> Mendukung format paragraf biasa</span>
                        </label>
                        <textarea name="content" required rows="10" placeholder="Ketikkan isi informasi warta di sini..." class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium leading-relaxed resize-y"></textarea>
                    </div>
                </div>
            </div>
            
            <!-- Image / Media Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50">
                    <h3 class="text-lg font-bold text-church-dark flex items-center gap-2">
                        <i class="fas fa-image text-church-gold"></i> Lampiran Gambar (Opsional)
                    </h3>
                </div>
                
                <div class="p-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Gambar / Poster Brosur</label>
                    
                    <div class="w-full relative">
                        <input type="url" name="image_url" placeholder="Masukkan URL gambar: https://..." class="w-full pl-11 pr-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium mb-4">
                        <div class="absolute top-3 left-4 pointer-events-none">
                            <i class="fas fa-link text-gray-400"></i>
                        </div>
                    </div>
                    
                    <div class="relative flex py-2 items-center">
                        <div class="flex-grow border-t border-gray-200"></div>
                        <span class="flex-shrink-0 mx-4 text-gray-400 text-xs uppercase tracking-widest font-bold">Atau</span>
                        <div class="flex-grow border-t border-gray-200"></div>
                    </div>

                    <div class="mt-4 border-2 border-dashed border-gray-300 rounded-2xl p-8 flex flex-col items-center justify-center bg-gray-50 hover:bg-church-warm/10 hover:border-church-gold transition-colors cursor-pointer group">
                        <div class="w-16 h-16 bg-white rounded-full shadow-sm flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-cloud-upload-alt text-2xl text-church-gold"></i>
                        </div>
                        <p class="font-bold text-gray-700 group-hover:text-church-dark transition-colors">Klik untuk mengunggah file</p>
                        <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG, WEBP (Max: 2MB)</p>
                        <input type="file" class="hidden">
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Config Column -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-6">
                <div class="px-6 py-5 border-b border-gray-50 bg-church-warm/20">
                    <h3 class="text-lg font-bold text-church-dark flex items-center gap-2">
                        <i class="fas fa-cog text-church-gold"></i> Pengaturan Tayang
                    </h3>
                </div>
                
                <div class="p-6 space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kategori Bidang <span class="text-red-500">*</span></label>
                        <select name="category" required class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark appearance-none font-medium">
                            <option value="" disabled selected>-- Pilih Bidang --</option>
                            <option value="Umum">Umum / Kesekretariatan</option>
                            <option value="Diakonia">Diakonia</option>
                            <option value="Marturia">Marturia (Misi/PI)</option>
                            <option value="Koinonia">Koinonia (Persekutuan)</option>
                            <option value="Pembinaan">Pembinaan (Teologi/PA)</option>
                            <option value="Sarpras">Sarana Prasarana</option>
                        </select>
                    </div>

                    <div class="border-t border-gray-100 pt-6"></div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center justify-between">
                            Mulai Ditampilkan <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="date" name="date_start" required class="w-full pl-10 pr-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                            <i class="fas fa-calendar-check absolute left-4 top-3.5 text-green-500 pointer-events-none"></i>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Selesai Ditampilkan <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input type="date" name="date_end" required class="w-full pl-10 pr-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                            <i class="fas fa-calendar-times absolute left-4 top-3.5 text-red-500 pointer-events-none"></i>
                        </div>
                        <p class="text-xs text-gray-400 mt-2"><i class="fas fa-info-circle"></i> Warta akan otomatis disembunyikan dari jemaat setelah tanggal ini berlalu.</p>
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
            <i class="fas fa-paper-plane"></i> Publikasikan Warta
        </button>
    </div>
</form>
@endsection
