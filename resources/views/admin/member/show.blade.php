@extends('components.admin.layout')
@section('page_title', 'Detail Jemaat')

@section('content')
<!-- Header -->
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="{{ route('admin.member.index') }}" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
            <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
                <i class="fas fa-arrow-left"></i>
            </div>
            Kembali ke Daftar Jemaat
        </a>
        <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Profil Jemaat</h2>
    </div>
    
    <div class="flex gap-3">
        <a href="#" class="px-5 py-2.5 bg-white border border-church-gold/30 rounded-xl text-church-dark font-bold hover:bg-church-gold/10 transition-colors shadow-sm flex items-center gap-2 text-sm">
            <i class="fas fa-edit text-church-gold"></i> Edit Data
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Left Column: Profile Card -->
    <div class="lg:col-span-1 space-y-6">
        <!-- Main Profile -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden text-center relative">
            <div class="h-24 bg-gradient-to-r from-church-gold to-yellow-600"></div>
            <div class="relative px-6 pb-6 -mt-12">
                <div class="w-24 h-24 rounded-full bg-white p-1 mx-auto shadow-md mb-4 flex items-center justify-center border border-gray-100 relative">
                    <div class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center text-3xl font-bold text-gray-400">
                        BS
                    </div>
                    <div class="absolute bottom-1 right-1 w-5 h-5 bg-green-500 border-2 border-white rounded-full" title="Aktif"></div>
                </div>
                
                <h3 class="text-2xl font-serif font-bold text-church-dark">Budi Santoso</h3>
                <p class="text-sm font-medium text-gray-500 mt-1">ID: JM-2026-0012</p>
                
                <div class="mt-4 inline-flex items-center px-3 py-1 rounded-lg text-sm font-bold bg-church-gold/20 text-yellow-800 border border-church-gold/30">
                    Penatua
                </div>
            </div>
        </div>

        <!-- Quick Contact -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-4">
            <h4 class="font-bold text-church-dark text-lg border-b border-gray-50 pb-2">Kontak Utama</h4>
            
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center text-green-600 shrink-0">
                    <i class="fab fa-whatsapp text-lg"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium">Nomor WhatsApp</p>
                    <p class="text-sm font-bold text-church-dark mt-0.5">0812 3456 7890</p>
                </div>
            </div>
            
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 shrink-0">
                    <i class="fas fa-envelope text-lg"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium">Email Address</p>
                    <p class="text-sm font-bold text-church-dark mt-0.5">budi.santoso@email.com</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Details -->
    <div class="lg:col-span-2 space-y-8">
        <!-- Data Pribadi -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-church-warm/20">
                <h3 class="text-xl font-serif font-bold text-church-dark flex items-center gap-2">
                    <i class="fas fa-user text-church-gold"></i> Informasi Pribadi
                </h3>
            </div>
            <div class="p-6">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                    <div>
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Tempat, Tanggal Lahir</dt>
                        <dd class="text-base font-medium text-church-dark">Bandung, 15 Maret 1985</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Jenis Kelamin</dt>
                        <dd class="text-base font-medium text-church-dark">Laki-laki</dd>
                    </div>
                    <div class="md:col-span-2">
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Alamat Lengkap</dt>
                        <dd class="text-base font-medium text-church-dark leading-relaxed">Jl. Sudirman No. 123, RT 01/RW 02, Kel. Garuda, Kec. Andir, Kota Bandung</dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Data Keanggotaan & Pelayanan -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-church-warm/20">
                <h3 class="text-xl font-serif font-bold text-church-dark flex items-center gap-2">
                    <i class="fas fa-church text-church-gold"></i> Keanggotaan & Pelayanan
                </h3>
            </div>
            <div class="p-6">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                    <div>
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Status Keanggotaan</dt>
                        <dd class="text-base font-medium text-church-dark">Sidi</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Tanggal Bergabung</dt>
                        <dd class="text-base font-medium text-church-dark">10 Januari 2010</dd>
                    </div>
                    <div class="col-span-1 md:col-span-2 border-t border-gray-100 pt-6 mt-2"></div>
                    <div>
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Wilayah / Rayon</dt>
                        <dd class="text-base font-medium text-church-dark flex items-center gap-2">
                            Galilea 
                            <span class="text-[10px] bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded-full font-bold">KETUA</span>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Komisi</dt>
                        <dd class="text-base font-medium text-church-dark">-</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection
