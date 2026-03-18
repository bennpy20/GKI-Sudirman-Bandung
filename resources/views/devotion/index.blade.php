@extends('components.layout')

@section('title')
    GKI Sudirman
@endsection

@section('content')
<template x-if="selectedDevotional">
    <div class="w-full mx-auto">
        <button @click="selectedDevotional = null" class="flex items-center gap-2 text-church-gold font-bold mb-8 hover:gap-3 transition-all">
            <svg class="w-5 h-5 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            Kembali ke Daftar
        </button>
        <div class="bg-white p-10 rounded-[40px] card-shadow border border-black/5">
            <span class="text-church-gold font-bold text-xs uppercase tracking-widest mb-4 block" x-text="formatDate(selectedDevotional.date)"></span>
            <h1 class="text-4xl md:text-5xl font-serif mb-6 leading-tight" x-text="selectedDevotional.title"></h1>
            <div class="flex items-center gap-2 text-sm opacity-50 italic mb-10 pb-6 border-b border-black/5">
                Oleh: <span x-text="selectedDevotional.author"></span>
            </div>
            <div class="text-church-dark/80 text-lg leading-relaxed space-y-6 whitespace-pre-wrap font-serif" x-text="selectedDevotional.content"></div>
        </div>
    </div>
</template>

<div x-show="!selectedDevotional && !selectedArticle">
    <div x-show="currentRoute === 'renungan_harian.index'">
        <div class="mb-10">
            <h2 class="text-3xl font-serif mb-2">Renungan Harian</h2>
            <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <template x-for="d in devotionals" :key="d.title">
                <div @click="selectedDevotional = d" class="bg-white p-8 rounded-3xl card-shadow border border-black/5 cursor-pointer group">
                    <span class="text-church-gold font-bold text-[10px] uppercase tracking-widest mb-3 block" x-text="formatDate(d.date)"></span>
                    <h3 class="text-2xl font-serif mb-4 group-hover:text-church-gold transition-colors" x-text="d.title"></h3>
                    <p class="text-church-dark/60 text-sm line-clamp-4 leading-relaxed mb-6" x-text="d.content"></p>
                    <div class="flex items-center justify-between pt-4 border-t border-black/5">
                        <span class="text-xs italic opacity-40">Oleh: <span x-text="d.author"></span></span>
                        <svg class="w-5 h-5 text-church-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
@endsection