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
    <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Sunting Data Warta Jemaat</h2>
</div>
<form action="{{ route('admin.announcement.update', $announcement->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
                        <input type="text" name="title" value="{{ old('title', $announcement->title) }}" required class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 flex justify-between">
                            <span>Isi Warta <span class="text-red-500">*</span></span>
                        </label>
                        <textarea name="content" required rows="10" class="w-full px-5 py-4 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium leading-relaxed resize-y">{{ old('content', $announcement->content) }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden" x-data="{ imagePreview: {{ $announcement->image_url ? '\'' . asset('storage/' . $announcement->image_url) . '\'' : 'null' }}, fileName: {{ $announcement->image_url ? '\'' . basename($announcement->image_url) . '\'' : 'null' }}, originalImage: {{ $announcement->image_url ? '\'' . asset('storage/' . $announcement->image_url) . '\'' : 'null' }}, originalName: {{ $announcement->image_url ? '\'' . basename($announcement->image_url) . '\'' : 'null' }}, isExisting: {{ $announcement->image_url ? 'true' : 'false' }} }">
                <input type="hidden" name="remove_image" x-ref="removeImage">
                <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-church-dark flex items-center gap-2">
                        Gambar/Poster Warta (Opsional)
                    </h3>
                    <button type="button" x-show="imagePreview && !isExisting" @click="imagePreview = originalImage; fileName = originalName; isExisting = true; $refs.fileInput.value = ''" class="cursor-pointer text-red-500 hover:text-red-700 text-sm font-bold flex items-center gap-1 transition-colors" style="display: none;">
                        <i class="fas fa-undo"></i>Batalkan Perubahan
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
                                    isExisting = false;
                                    $refs.removeImage.value = '';
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
                <div class="p-6 md:p-8" x-show="imagePreview">
                    <div class="flex flex-col items-center gap-4">
                        <div class="w-full max-w-sm rounded-xl overflow-hidden shadow-sm border border-gray-200 relative group bg-gray-100 flex items-center justify-center min-h-[160px]">
                            <img :src="imagePreview" class="w-full max-h-[320px] object-contain">
                            <div x-show="isExisting" class="absolute top-3 right-3 bg-black/60 backdrop-blur-md text-white px-3 py-1 rounded-full text-[10px] font-bold border border-white/20 uppercase tracking-wider">
                                Gambar Saat Ini
                            </div>
                            <div class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <i class="fas fa-camera text-3xl text-white mb-2"></i>
                                <button type="button" @click="$refs.fileInput.click()" class="text-white font-bold text-sm">
                                    Ganti Gambar
                                </button>
                            </div>
                        </div>
                        <div class="w-full max-w-sm bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 flex justify-between items-center gap-3">
                            <div class="flex items-center gap-3 overflow-hidden">
                                <i class="fas fa-image text-church-gold text-lg shrink-0"></i>
                                <span class="text-sm font-medium text-gray-700 truncate" x-text="fileName"></span>
                            </div>
                            <button type="button" @click="imagePreview = null; fileName = null; isExisting = false; $refs.fileInput.value = ''; $refs.removeImage.value = 1;"
                                class="cursor-pointer text-xs text-red-500 font-bold hover:text-red-700 px-3 py-1.5 rounded-lg border border-red-200 bg-red-50 hover:bg-red-100 transition-colors shrink-0">
                                Hapus
                            </button>
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
                            <option value="1" {{ old('category', $announcement->category) == '1' ? 'selected' : '' }}>Diakonia</option>
                            <option value="2" {{ old('category', $announcement->category) == '2' ? 'selected' : '' }}>Persekutuan dan Keesaan</option>
                            <option value="3" {{ old('category', $announcement->category) == '3' ? 'selected' : '' }}>Pembinaan</option>
                            <option value="4" {{ old('category', $announcement->category) == '4' ? 'selected' : '' }}>Sarana Penunjang</option>
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
                            <input type="date" name="date_start" value="{{ old('date_start', $announcement->date_start) }}" required class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
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
                            <input type="date" name="date_end" value="{{ old('date_end', $announcement->date_end) }}" required class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
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
            <i class="fas fa-save"></i>Perbarui Warta Jemaat
        </button>
    </div>
</form>
@endsection
