@extends('components.layout')

@section('title')
    GKI Sudirman
@endsection

@section('content')
<div x-show="!selectedDevotional && !selectedArticle">
    <div x-show="currentRoute === 'warta_jemaat.index'">
        <div class="mb-10">
            <h2 class="text-3xl font-serif mb-2">Warta Jemaat</h2>
            <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <template x-for="item in warta.filter(w => currentRoute.includes(w.type))" :key="item.title">
                <div class="bg-white rounded-3xl overflow-hidden card-shadow border border-black/5 flex flex-col">
                    <img :src="item.image_url" class="h-48 w-full object-cover">
                    <div class="p-6">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-church-gold mb-2 block" x-text="formatDate(item.date)"></span>
                        <h3 class="text-xl font-serif mb-3" x-text="item.title"></h3>
                        <p class="text-sm text-church-dark/60 mb-6" x-text="item.description"></p>
                        <button class="w-full py-3 bg-church-warm/30 rounded-xl text-xs font-bold">Lihat Detail</button>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
@endsection