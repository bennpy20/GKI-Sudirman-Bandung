@extends('components.admin.layout')

@section('page_title', 'Kelola Profil Gereja')

@section('title', 'Admin - Profil Gereja')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="{{ route('admin.about.index') }}" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
            <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
                <i class="fas fa-arrow-left"></i>
            </div>
            Kembali
        </a>
        <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Detail Profil Gereja</h2>
    </div>
</div>

<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.04)] border border-gray-100 overflow-hidden relative">
        <div class="absolute top-0 left-0 right-0 h-24 bg-gradient-to-br from-blue-50 to-white/10 z-0"></div>
        <div class="absolute right-0 top-0 w-24 h-24 bg-church-gold/10 rounded-full blur-[80px] z-0"></div>
        <div class="p-8 md:p-12 relative z-10 text-center">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-white border border-gray-200 text-blue-600 mb-8 shadow-xl relative z-10">
                <i class="fas fa-file-alt text-church-gold text-3xl"></i>
            </div>
            <h1 class="text-2xl md:text-3xl font-bold text-church-dark leading-tight">
                {{ $about->name }}
            </h1>
            <div class="prose prose-xl prose-gray max-w-none prose-p:leading-loose prose-p:text-gray-700 font-sans mx-auto text-left">
                <p class="text-xl italic text-church-dark whitespace-pre-line">
                    {{ $about->description }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
