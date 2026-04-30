@extends('components.admin.layout')

@section('page_title', 'Kelola Warta Jemaat')

@section('title', 'Admin - Warta Jemaat')

@section('content')
<div class="mb-8 relative z-10">
    <a href="{{ route('admin.announcement.index') }}" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
        <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </div>
        Kembali
    </a>
    <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Tambah Data Warta Jemaat</h2>
</div>

<form action="{{ route('admin.announcement.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 pb-24">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50">
                    <h3 class="text-lg font-bold text-church-dark flex items-center gap-2">
                        Data Warta Jemaat
                    </h3>
                </div>
                <div class="p-6 md:p-8 space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Judul Warta <span class="text-red-500">*</span></label>
                        <input type="text" name="title" required placeholder="Tuliskan judul warta.." class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 flex justify-between">
                            <span>Isi Warta <span class="text-red-500">*</span></span>
                        </label>
                        <textarea name="content" required rows="10" placeholder="Tuliskan isi warta.." class="w-full px-5 py-4 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium leading-relaxed resize-y"></textarea>
                        @error('content')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden" x-data="{ imagePreview: null, fileName: null }">
                <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-church-dark flex items-center gap-2">
                        Gambar/Poster Warta (Opsional)
                    </h3>
                    <button type="button" x-show="imagePreview" @click="imagePreview = null; fileName = null; $refs.fileInput.value = ''" class="cursor-pointer text-red-500 hover:text-red-700 text-sm font-bold flex items-center gap-2 transition-colors" style="display: none;">
                        <i class="fas fa-times"></i>Batalkan
                    </button>
                </div>
                <!-- Upload gambar asli -->
                <div class="p-6 md:p-8 space-y-6" x-show="!imagePreview">
                    <label class="border-2 border-dashed border-gray-300 rounded-2xl p-8 flex flex-col items-center justify-center bg-gray-50/50 hover:bg-church-warm/10 hover:border-church-gold transition-colors cursor-pointer group">
                        <div class="w-16 h-16 bg-white rounded-full shadow-sm flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-cloud-upload-alt text-2xl text-church-gold"></i>
                        </div>
                        <p class="font-bold text-gray-700 group-hover:text-church-dark transition-colors">Klik untuk mengunggah file</p>
                        <p class="text-xs text-gray-400 mt-2 text-center">Format: JPG, JPEG, PNG, WEBP <br>(Max: 2MB)</p>
                        <input type="file" name="image_url" x-ref="fileInput" class="hidden" accept=".jpg,.jpeg,.png,.webp"
                            @change="
                                const file = $event.target.files[0];
                                if (file) {
                                    fileName = file.name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => imagePreview = e.target.result;
                                    reader.readAsDataURL(file);
                                }
                            ">
                    </label>
                    @error('image_url')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Preview gambar yg diupload -->
                <div class="p-6 md:p-8" x-show="imagePreview" style="display: none;">
                    <div class="flex flex-col items-center gap-4">
                        <div class="w-full max-w-sm rounded-xl overflow-hidden shadow-sm border border-gray-200 relative group bg-gray-100 flex items-center justify-center min-h-[160px]">
                            <img :src="imagePreview" class="w-full max-h-[320px] object-contain">
                            <div class="absolute inset-0 bg-black/40 opacity-0 hover:opacity-100 flex items-center justify-center transition">
                                <button type="button"
                                        @click="$refs.fileInput.click()"
                                        class="text-white font-bold">
                                    Ganti Gambar
                                </button>
                            </div>
                        </div>
                        <div class="w-full max-w-sm bg-gray-50 border border-gray-200 rounded-lg px-4 py-2 flex items-center gap-3">
                            <i class="fas fa-image text-church-gold text-lg"></i>
                            <span class="text-sm font-medium text-gray-700 truncate flex-1" x-text="fileName"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-6">
                <div class="px-6 py-5 border-b border-gray-50 bg-church-warm/20">
                    <h3 class="text-lg font-bold text-church-dark flex items-center gap-2">
                        Pengaturan Warta
                    </h3>
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kategori Bidang <span class="text-red-500">*</span></label>
                        <select name="category" required class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark appearance-none font-medium">
                            <option value="" disabled selected>Pilih Bidang</option>
                            <option value="1">Diakonia</option>
                            <option value="2">Persekutuan dan Keesaan</option>
                            <option value="3">Pembinaan</option>
                            <option value="4">Sarana Penunjang</option>
                        </select>
                        @error('category')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="border-t border-gray-100"></div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Tanggal Mulai Ditampilkan <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="date" name="date_start" required class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                        </div>
                        @error('date_start')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Tanggal Selesai Ditampilkan <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="date" name="date_end" required class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                        </div>
                        @error('date_end')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed bottom-0 left-0 md:left-64 right-0 p-4 lg:p-6 bg-white/90 backdrop-blur-md border-t border-gray-200/60 z-30 flex justify-end gap-3 shadow-[0_-10px_40px_rgba(0,0,0,0.05)] transition-all">
        <a href="{{ route('admin.announcement.index') }}" class="px-5 lg:px-6 py-2.5 lg:py-3 bg-white border border-gray-300 rounded-xl text-gray-700 font-bold hover:bg-gray-50 transition-colors text-sm lg:text-base">
            Batalkan
        </a>
        <button type="submit" class="cursor-pointer px-6 lg:px-8 py-2.5 lg:py-3 bg-gradient-to-r from-church-gold to-yellow-600 rounded-xl text-church-dark font-bold hover:from-yellow-500 hover:to-yellow-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm lg:text-base flex items-center gap-2">
            <i class="fas fa-save"></i>Simpan Warta Jemaat
        </button>
    </div>
</form>
@endsection
