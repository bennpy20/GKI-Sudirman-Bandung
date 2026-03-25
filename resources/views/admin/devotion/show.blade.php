@extends('components.admin.layout')
@section('page_title', 'Baca Renungan')

@section('content')
<!-- Header -->
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="#" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
            <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
                <i class="fas fa-arrow-left"></i>
            </div>
            Kembali ke Daftar Renungan
        </a>
    </div>
    
    <div class="flex gap-3">
        <a href="#" class="px-5 py-2.5 bg-white border border-church-gold/30 rounded-xl text-church-dark font-bold hover:bg-church-gold/10 transition-colors shadow-sm flex items-center gap-2 text-sm">
            <i class="fas fa-edit text-church-gold"></i> Edit Tulisan
        </a>
    </div>
</div>

<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.04)] border border-gray-100 overflow-hidden relative">
        <!-- Decorative Header Background -->
        <div class="absolute top-0 left-0 right-0 h-32 bg-gradient-to-br from-church-warm/40 to-white/10 z-0"></div>
        
        <div class="p-8 md:p-12 relative z-10">
            <!-- Badges -->
            <div class="flex items-center gap-3 mb-6">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-church-gold/10 text-yellow-700 border border-church-gold/20">
                    <i class="fas fa-layer-group"></i> Artikel Umum
                </span>
                <span class="text-xs font-medium text-gray-400">
                    <i class="far fa-clock mr-1"></i> Dipublikasi pada 20 Mar 2026
                </span>
            </div>
            
            <h1 class="text-3xl md:text-5xl font-serif font-bold text-church-dark leading-tight mb-8">
                Tuhan Penolong yang Setia
            </h1>
            
            <div class="flex items-center gap-4 mb-10 pb-8 border-b border-gray-100">
                <div class="h-12 w-12 rounded-full bg-gradient-to-tr from-gray-100 to-gray-200 border border-gray-300 flex items-center justify-center text-gray-500 text-xl font-bold">
                    Y
                </div>
                <div>
                    <div class="font-bold text-church-dark text-base">Pdt. Yohanes</div>
                    <div class="text-xs text-gray-500">Penulis Renungan</div>
                </div>
            </div>
            
            <!-- Bible Verse Blockquote -->
            <div class="my-8 relative">
                <div class="absolute -left-4 top-0 bottom-0 w-1 bg-church-gold rounded-r-lg"></div>
                <blockquote class="pl-6 italic font-serif text-xl md:text-2xl text-gray-600 leading-relaxed">
                    "Aku melayangkan mataku ke gunung-gunung; dari manakah akan datang pertolonganku? Pertolonganku ialah dari TUHAN, yang menjadikan langit dan bumi."
                </blockquote>
                <div class="mt-4 pl-6 font-bold text-church-dark text-sm" tracking-widest uppercase>
                    — Mazmur 121:1-2
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="prose prose-lg prose-gray max-w-none prose-p:leading-loose prose-p:text-gray-700 font-sans mt-10">
                <p>
                    Seringkali dalam hidup ini kita merasa seperti berada di lembah kekelaman, terdesak oleh berbagai masalah dan tantangan yang menjulang tinggi seperti gunung di hadapan kita. Namun, Pemazmur mengingatkan kita bahwa pertolongan kita bukan datang dari gunung-gunung itu, melainkan dari TUHAN yang menjadikan langit dan bumi.
                </p>
                <p>
                    Jadikanlah renungan ini sebagai pengingat di pagi hari bahwa Tuhan tidak pernah terlelap maupun tertidur. Ia setia menjaga umat-Nya kapanpun dan dimanapun kita berada.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
