@extends('components.admin.layout')
@section('page_title', 'Edit Ibadah Minggu')

@section('content')
<!-- Header -->
<div class="mb-8">
    <a href="#" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
        <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </div>
        Kembali ke Daftar Ibadah
    </a>
    <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Perbarui Jadwal Ibadah</h2>
    <p class="text-sm text-gray-500 font-sans mt-2 flex items-center gap-2">
        <i class="fas fa-edit text-church-gold"></i> Edit detail jadwal dan penatalayan ibadah raya.
    </p>
</div>

<form action="#" method="POST">
    @csrf
    @method('PUT')
    
    <div class="space-y-8">
        <!-- Informasi Ibadah (Full Width) -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 md:px-8 py-5 border-b border-gray-50 bg-church-warm/20 flex items-center justify-between">
                <h3 class="text-xl font-serif font-bold text-church-dark flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-church-gold/20 text-yellow-700 flex items-center justify-center text-sm">1</div>
                    Informasi Utama Ibadah
                </h3>
            </div>
            
            <div class="p-6 md:p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tema / Topik Khotbah <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="Berjalan Bersama Tuhan di Tengah Badai" required class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all focus:bg-white text-church-dark font-medium lg:text-lg">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nas Alkitab Acuan <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-book-open text-gray-400"></i>
                            </div>
                            <input type="text" name="bible_verse" value="Mazmur 23:1-6" required class="w-full pl-11 pr-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all focus:bg-white text-church-dark font-medium lg:text-lg">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Sesi Kebaktian <span class="text-red-500">*</span></label>
                        <select name="session" required class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark appearance-none font-medium">
                            <option value="Kebaktian Umum 1 (07:00)" selected>Kebaktian Umum 1 (07:00)</option>
                            <option value="Kebaktian Umum 2 (09:30)">Kebaktian Umum 2 (09:30)</option>
                            <option value="Kebaktian Umum 3 (17:00)">Kebaktian Umum 3 (17:00)</option>
                            <option value="Ibadah Khusus Masa Raya">Ibadah Khusus Masa Raya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Pelaksanaan <span class="text-red-500">*</span></label>
                        <input type="date" name="date" value="2026-04-26" required class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tautan Video Live (YouTube)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fab fa-youtube text-red-500"></i>
                            </div>
                            <input type="url" name="video_url" value="https://youtube.com/watch?v=mockurlid" class="w-full pl-11 pr-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all focus:bg-white text-church-dark font-medium">
                        </div>
                    </div>

                    <div class="md:col-span-2 lg:col-span-3 border-t border-gray-100 pt-6 mt-2">
                        <h4 class="text-sm font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <i class="fas fa-calendar-alt text-church-gold"></i> Penyesuaian Kalender Liturgi
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Pekan / Kalender Liturgi <span class="text-red-500">*</span></label>
                                <select name="liturgy_id" required class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark appearance-none font-medium">
                                    <option value="1">Minggu Biasa</option>
                                    <option value="2">Minggu Advent 1</option>
                                    <option value="3" selected>Minggu Prapaskah 1</option>
                                    <option value="4">Jumat Agung</option>
                                    <option value="5">Paskah</option>
                                    <option value="6">Pentakosta</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Warna Liturgi <span class="text-red-500">*</span></label>
                                <select name="liturgy_color" required class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark appearance-none font-medium">
                                    <option value="Hijau">Hijau (Pertumbuhan / Minggu Biasa)</option>
                                    <option value="Ungu" selected>Ungu (Pertobatan / Persiapan)</option>
                                    <option value="Putih">Putih (Kesucian / Kebangkitan)</option>
                                    <option value="Merah">Merah (Roh Kudus / Pengorbanan)</option>
                                    <option value="Hitam">Hitam (Duka Cita / Kematian)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Penatalayan Card (Internal Members) -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden h-full flex flex-col">
                <div class="px-6 py-5 border-b border-gray-50 bg-church-warm/20 flex justify-between items-center relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-16 h-16 bg-church-gold/10 rounded-full"></div>
                    <h3 class="text-xl font-serif font-bold text-church-dark flex items-center gap-3 relative z-10">
                        <div class="w-8 h-8 rounded-lg bg-church-gold/20 text-yellow-700 flex items-center justify-center text-sm">2</div>
                        Penatalayan Internal
                    </h3>
                    <button type="button" class="text-sm font-bold text-blue-600 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg border border-blue-100 transition-colors shadow-sm relative z-10">
                        <i class="fas fa-plus mr-1"></i> Tambah Posisi
                    </button>
                </div>
                
                <div class="p-6 bg-gray-50/30 flex-1 space-y-4">
                    <!-- Penatalayan Item 1 -->
                    <div class="p-4 bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col sm:flex-row gap-4">
                        <div class="w-full sm:w-1/3">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-1.5">Peran Pelayanan</label>
                            <select name="steward_id[]" class="w-full px-3 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark text-sm appearance-none font-bold">
                                <option value="1" selected>Pengkhotbah</option>
                                <option value="2">Liturgos</option>
                                <option value="3">Pemusik</option>
                            </select>
                        </div>
                        <div class="w-full sm:w-2/3 flex gap-2">
                            <div class="flex-1">
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-1.5">Nama Jemaat yg Bertugas</label>
                                <select name="member_id[]" class="w-full px-3 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark text-sm appearance-none font-medium">
                                    <option value="1" selected>Budi Santoso</option>
                                    <option value="2">Maria Irawan</option>
                                </select>
                            </div>
                            <div class="pt-6">
                                <button type="button" class="w-10 h-10 flex items-center justify-center text-red-500 bg-red-50 hover:bg-red-100 rounded-lg border border-red-100 transition-colors">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Penatalayan Item 2 -->
                    <div class="p-4 bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col sm:flex-row gap-4">
                        <div class="w-full sm:w-1/3">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-1.5">Peran Pelayanan</label>
                            <select name="steward_id[]" class="w-full px-3 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark text-sm appearance-none font-bold">
                                <option value="1">Pengkhotbah</option>
                                <option value="2" selected>Liturgos</option>
                                <option value="3">Pemusik</option>
                            </select>
                        </div>
                        <div class="w-full sm:w-2/3 flex gap-2">
                            <div class="flex-1">
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-1.5">Nama Jemaat yg Bertugas</label>
                                <select name="member_id[]" class="w-full px-3 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark text-sm appearance-none font-medium">
                                    <option value="1">Budi Santoso</option>
                                    <option value="2" selected>Maria Irawan</option>
                                </select>
                            </div>
                            <div class="pt-6">
                                <button type="button" class="w-10 h-10 flex items-center justify-center text-red-500 bg-red-50 hover:bg-red-100 rounded-lg border border-red-100 transition-colors">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Guest Role Card (External) -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden h-full flex flex-col">
                <div class="px-6 py-5 border-b border-gray-50 bg-church-warm/20 flex justify-between items-center relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-16 h-16 bg-church-gold/10 rounded-full"></div>
                    <h3 class="text-xl font-serif font-bold text-church-dark flex items-center gap-3 relative z-10">
                        <div class="w-8 h-8 rounded-lg bg-church-gold/20 text-yellow-700 flex items-center justify-center text-sm">3</div>
                        Pelayanan Tamu Khusus
                    </h3>
                    <button type="button" class="text-sm font-bold text-purple-600 bg-purple-50 hover:bg-purple-100 px-3 py-1.5 rounded-lg border border-purple-100 transition-colors shadow-sm relative z-10">
                        <i class="fas fa-plus mr-1"></i> Tambah Tamu
                    </button>
                </div>
                
                <div class="p-6 bg-gray-50/30 flex-1 space-y-4">
                    <!-- Guest Item -->
                    <div class="p-4 bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col sm:flex-row gap-4">
                        <div class="w-full sm:w-1/2">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-1.5">Nama Tamu / Lembaga</label>
                            <input type="text" name="guest_name[]" value="Paduan Suara GKI Kebayoran Baru" class="w-full px-3 py-2.5 bg-gray-50/50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-church-gold outline-none transition-all focus:bg-white text-church-dark text-sm font-medium">
                        </div>
                        <div class="w-full sm:w-1/2 flex gap-2">
                            <div class="flex-1">
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-1.5">Keterangan / Role</label>
                                <input type="text" name="guest_role[]" value="Persembahan Pujian Ekstra" class="w-full px-3 py-2.5 bg-gray-50/50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-church-gold outline-none transition-all focus:bg-white text-church-dark text-sm font-medium">
                            </div>
                            <div class="pt-6">
                                <button type="button" class="w-10 h-10 flex items-center justify-center text-red-500 bg-red-50 hover:bg-red-100 rounded-lg border border-red-100 transition-colors">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
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
            <i class="fas fa-save"></i> Perbarui Jadwal
        </button>
    </div>
</form>

<!-- Spacer for fixed footer -->
<div class="h-24"></div>
@endsection
