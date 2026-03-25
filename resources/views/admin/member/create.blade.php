@extends('components.admin.layout')
@section('page_title', 'Tambah Jemaat')

@section('content')
<!-- Header -->
<div class="mb-8">
    <a href="{{ route('admin.member.index') }}" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
        <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </div>
        Kembali ke Daftar Jemaat
    </a>
    <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Registrasi Jemaat Baru</h2>
    <p class="text-sm text-gray-500 font-sans mt-2 flex items-center gap-2">
        <i class="fas fa-edit text-church-gold"></i> Masukkan detail informasi jemaat baru secara lengkap.
    </p>
</div>

<form action="{{ route('admin.member.store') }}" method="POST">
    @csrf
    
    <div class="space-y-8">
        <!-- Data Pribadi Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 md:px-8 py-5 border-b border-gray-50 bg-church-warm/20">
                <h3 class="text-xl font-serif font-bold text-church-dark flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-church-gold/20 text-yellow-700 flex items-center justify-center text-sm">1</div>
                    Informasi Pribadi
                </h3>
            </div>
            
            <div class="p-6 md:p-8 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="name" required placeholder="Contoh: Budi Santoso" class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all focus:bg-white text-church-dark font-medium">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tempat, Tanggal Lahir</label>
                        <div class="flex gap-2">
                            <input type="text" name="birth_place" placeholder="Tempat" class="w-1/2 px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all focus:bg-white text-church-dark font-medium text-sm">
                            <input type="date" name="birth_date" class="w-1/2 px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all focus:bg-white text-church-dark font-medium text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Jenis Kelamin</label>
                        <div class="grid grid-cols-2 gap-3 h-[46px]">
                            <label class="flex items-center justify-center gap-2 px-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors has-[:checked]:bg-church-gold/10 has-[:checked]:border-church-gold has-[:checked]:text-yellow-800 font-medium">
                                <input type="radio" name="gender" value="L" class="text-church-gold focus:ring-church-gold"> Laki-laki
                            </label>
                            <label class="flex items-center justify-center gap-2 px-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors has-[:checked]:bg-church-gold/10 has-[:checked]:border-church-gold has-[:checked]:text-yellow-800 font-medium">
                                <input type="radio" name="gender" value="P" class="text-church-gold focus:ring-church-gold"> Perempuan
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nomor Telepon / WhatsApp</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fab fa-whatsapp text-gray-400"></i>
                            </div>
                            <input type="text" name="phone_number" placeholder="08..." class="w-full pl-11 pr-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all focus:bg-white text-church-dark font-medium">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Email (Opsional)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="far fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" name="email" placeholder="contoh@email.com" class="w-full pl-11 pr-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all focus:bg-white text-church-dark font-medium">
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Lengkap</label>
                        <textarea name="address" rows="3" placeholder="Nama Jalan, RT/RW, Kelurahan, Kecamatan" class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all focus:bg-white text-church-dark resize-none font-medium"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Data Keanggotaan Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden h-full">
                <div class="px-6 py-5 border-b border-gray-50 bg-church-warm/20">
                    <h3 class="text-xl font-serif font-bold text-church-dark flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-church-gold/20 text-yellow-700 flex items-center justify-center text-sm">2</div>
                        Manajemen Status
                    </h3>
                </div>
                
                <div class="p-6 space-y-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Keaktifan Jemaat</label>
                        <select name="is_active" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark appearance-none font-medium">
                            <option value="1">Aktif Melayani / Beribadah</option>
                            <option value="0">Non-Aktif (Atestasi/Meninggal)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Status / Jabatan <span class="text-red-500">*</span></label>
                        <select name="status" required class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark appearance-none font-medium">
                            <option value="" disabled selected>-- Pilih Status --</option>
                            <option value="1">Coordinator Hamba Tuhan</option>
                            <option value="2">Hamba Tuhan Biasa</option>
                            <option value="3">Penatua</option>
                            <option value="4">Diaken</option>
                            <option value="5">Jemaat Biasa</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Membership <span class="text-red-500">*</span></label>
                        <select name="membership" required class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark appearance-none font-medium">
                            <option value="" disabled selected>-- Kepesertaan --</option>
                            <option value="1">Baptis Anak</option>
                            <option value="2">Sidi</option>
                            <option value="3">Atestasi Masuk</option>
                            <option value="4">Atestasi Keluar</option>
                            <option value="5">Meninggal</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Bergabung</label>
                        <input type="date" name="join_date" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium text-sm">
                    </div>
                </div>
            </div>

            <!-- Organisasi Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden h-full">
                <div class="px-6 py-5 border-b border-gray-50 bg-church-warm/20">
                    <h3 class="text-xl font-serif font-bold text-church-dark flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-church-gold/20 text-yellow-700 flex items-center justify-center text-sm">3</div>
                        Pelayanan
                    </h3>
                </div>
                
                <div class="p-6 space-y-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Wilayah / Rayon</label>
                        <select name="regions_id" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark appearance-none font-medium">
                            <option value="" disabled selected>-- Pilih Wilayah --</option>
                            <option value="1">Galilea</option>
                            <option value="2">Yerusalem</option>
                            <option value="3">Nazaret</option>
                        </select>
                    </div>

                    <label class="flex items-center gap-3 p-4 bg-yellow-50/50 border border-yellow-100 rounded-xl cursor-pointer hover:bg-yellow-50 transition-colors group mt-[18px]">
                        <div class="relative flex items-center">
                            <input type="checkbox" name="is_region_leader" value="1" class="w-5 h-5 text-church-gold rounded border-gray-300 focus:ring-church-gold">
                        </div>
                        <span class="text-sm font-bold text-yellow-800">Jabatan sebagai Ketua Rayon</span>
                    </label>

                    <div class="mt-[18px]">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Komisi Kategorial</label>
                        <select name="commissions_id" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark appearance-none font-medium">
                            <option value="" disabled selected>-- Pilih Komisi --</option>
                            <option value="1">Komisi Anak</option>
                            <option value="2">Komisi Remaja</option>
                            <option value="3">Komisi Pemuda</option>
                            <option value="4">Komisi Dewasa</option>
                            <option value="5">Komisi Lansia</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <input type="hidden" name="users_id" value="1">
    </div>

    <!-- Sticky Footer Actions -->
    <div class="fixed bottom-0 left-0 md:left-64 right-0 p-4 lg:p-6 bg-white/90 backdrop-blur-md border-t border-gray-200/60 z-30 flex justify-end gap-3 shadow-[0_-10px_40px_rgba(0,0,0,0.05)] transition-all">
        <a href="{{ route('admin.member.index') }}" class="px-5 lg:px-6 py-2.5 lg:py-3 bg-white border border-gray-300 rounded-xl text-gray-700 font-bold hover:bg-gray-50 transition-colors text-sm lg:text-base">
            Batalkan
        </a>
        <button type="submit" class="px-6 lg:px-8 py-2.5 lg:py-3 bg-gradient-to-r from-church-gold to-yellow-600 rounded-xl text-church-dark font-bold hover:from-yellow-500 hover:to-yellow-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm lg:text-base flex items-center gap-2">
            <i class="fas fa-save"></i> Simpan Data Jemaat
        </button>
    </div>
</form>

<!-- Spacer for fixed footer -->
<div class="h-24"></div>
@endsection