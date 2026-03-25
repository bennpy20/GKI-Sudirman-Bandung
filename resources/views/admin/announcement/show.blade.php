@extends('components.admin.layout')
@section('page_title', 'Detail Warta Jemaat')

@section('content')
<!-- Header -->
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="#" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
            <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
                <i class="fas fa-arrow-left"></i>
            </div>
            Kembali ke Daftar Warta
        </a>
        <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Aksi Donor Darah Jemaat 2026</h2>
        <div class="flex flex-wrap items-center gap-3 mt-3">
            <div class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-blue-50 text-blue-700 border border-blue-100 shadow-sm">
                <i class="fas fa-tags mr-2 opacity-70"></i> Bidang Diakonia
            </div>
            <div class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-green-50 text-green-700 border border-green-100 shadow-sm">
                <span class="w-2 h-2 rounded-full bg-green-500 mr-2 animate-pulse"></span> Sedang Tayang
            </div>
        </div>
    </div>
    
    <div class="flex gap-3 w-full md:w-auto">
        <a href="#" class="flex-1 md:flex-none justify-center px-5 py-2.5 bg-white border border-church-gold/30 rounded-xl text-church-dark font-bold hover:bg-church-gold/10 transition-colors shadow-sm flex items-center gap-2 text-sm">
            <i class="fas fa-edit text-church-gold"></i> Edit Warta
        </a>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Left Configuration Overview -->
    <div class="md:col-span-1 space-y-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50">
                <h3 class="font-bold text-church-dark flex items-center gap-2">
                    <i class="fas fa-calendar-alt text-church-gold"></i> Periode Tayang
                </h3>
            </div>
            <div class="p-6">
                <div class="flex flex-col gap-4">
                    <div class="flex items-start gap-3">
                        <div class="mt-0.5 text-green-500"><i class="fas fa-play-circle text-xl"></i></div>
                        <div>
                            <div class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Mulai Tayang</div>
                            <div class="font-bold text-church-dark text-base">01 Mei 2026</div>
                        </div>
                    </div>
                    
                    <div class="ml-2.5 border-l-2 border-dashed border-gray-200 h-6"></div>
                    
                    <div class="flex items-start gap-3">
                        <div class="mt-0.5 text-red-500"><i class="fas fa-stop-circle text-xl"></i></div>
                        <div>
                            <div class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Selesai Tayang</div>
                            <div class="font-bold text-church-dark text-base">15 Mei 2026</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
             <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50">
                <h3 class="font-bold text-church-dark flex items-center gap-2">
                    <i class="fas fa-info-circle text-church-gold"></i> Metadata
                </h3>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <span class="text-xs text-gray-500 block">Kategori / Bidang</span>
                    <span class="font-bold text-church-dark">Diakonia</span>
                </div>
                <div>
                    <span class="text-xs text-gray-500 block">Terakhir Diubah</span>
                    <span class="font-bold text-church-dark">20 Mar 2026, 15:45</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Reading Preview -->
    <div class="md:col-span-2 space-y-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-1">
                <!-- Banner Image Preview -->
                <div class="w-full h-48 md:h-64 rounded-xl bg-gray-100 bg-cover bg-center" style="background-image: url('https://placehold.co/800x400?text=Donor+Darah+2026')">
                    <!-- Or placeholder if no image -->
                </div>
            </div>
            
            <div class="p-6 md:p-8">
                <h1 class="text-2xl font-serif font-bold text-church-dark mb-6">Aksi Donor Darah Jemaat 2026</h1>
                
                <div class="prose prose-sm md:prose-base prose-gray max-w-none prose-p:leading-relaxed prose-headings:font-serif">
                    <p>Diadakan bekerjasama dengan PMI Kota Bandung.</p>
                    <p>Acara rutin tahunan ini memanggil seluruh jemaat dan pemuda untuk mendonorkan darahnya sebagai bentuk diakonia nyata kita untuk sesama.</p>
                    <br>
                    <p><strong>Mohon hadir pada:</strong></p>
                    <ul>
                        <li><strong>Jam:</strong> 09:00 WIB</li>
                        <li><strong>Tempat:</strong> Aula Gedung B</li>
                        <li><strong>Syarat:</strong> Sehat jasmani dan tidak sedang meminum obat antibiotik selama 7 hari terakhir.</li>
                    </ul>
                    <p>Bagi jemaat yang ingin berpartisipasi, silakan mendaftar secara online atau langsung ke posko kesehatan di lobi utama pada jam kebaktian hari Minggu.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
