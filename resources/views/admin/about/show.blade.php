@extends('components.admin.layout')
@section('page_title', 'Detail Profil Gereja')

@section('content')
<!-- Header -->
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="#" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
            <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
                <i class="fas fa-arrow-left"></i>
            </div>
            Kembali ke Tentang Gereja
        </a>
    </div>
    
    <div class="flex gap-3">
        <a href="#" class="px-5 py-2.5 bg-white border border-church-gold/30 rounded-xl text-church-dark font-bold hover:bg-church-gold/10 transition-colors shadow-sm flex items-center gap-2 text-sm">
            <i class="fas fa-edit text-church-gold"></i> Ubah Profil
        </a>
    </div>
</div>

<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.04)] border border-gray-100 overflow-hidden relative">
        <!-- Decorative Header Background -->
        <div class="absolute top-0 left-0 right-0 h-32 bg-gradient-to-br from-blue-50 to-white/10 z-0"></div>
        <div class="absolute right-0 top-0 w-64 h-64 bg-church-gold/10 rounded-full blur-[80px] z-0"></div>
        
        <div class="p-8 md:p-12 relative z-10 text-center">
            
            <div class="inline-flex items-center justify-center w-24 h-24 rounded-2xl bg-white border border-gray-200 text-blue-600 mb-8 shadow-xl relative z-10">
                <i class="fas fa-eye text-4xl"></i>
            </div>
            
            <h1 class="text-3xl md:text-5xl font-serif font-bold text-church-dark leading-tight mb-6">
                Visi GKI
            </h1>
            
            <div class="inline-flex items-center gap-2 mb-10 text-xs font-bold text-gray-400 uppercase tracking-widest pb-8 border-b border-gray-100 w-full justify-center">
                <i class="far fa-clock"></i> Terakhir diperbarui 2 bulan lalu
            </div>
            
            <!-- Main Content -->
            <div class="prose prose-xl prose-gray max-w-none prose-p:leading-loose prose-p:text-gray-700 font-sans mx-auto text-left md:text-center mt-6">
                <p class="text-2xl font-serif italic text-church-dark">
                    "Menjadi gereja yang menghadirkan damai sejahtera Allah bagi sesama dan alam semesta melalui persekutuan yang bersaksi dan melayani."
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
