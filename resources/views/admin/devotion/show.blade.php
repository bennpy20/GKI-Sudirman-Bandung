@extends('components.admin.layout')

@section('page_title', 'Kelola Renungan Harian')

@section('title', 'Admin - Renungan Harian')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="{{ route('admin.devotion.index') }}" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
            <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
                <i class="fas fa-arrow-left"></i>
            </div>
            Kembali
        </a>
        <h2 class="text-3xl font-bold text-church-dark mt-1">Detail Renungan Harian</h2>
    </div>
</div>
<div class="grid grid-cols-1 gap-8 mx-auto">
    <div class="bg-white rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.04)] border border-gray-100 overflow-hidden relative">
        <div class="p-8 md:p-12 relative z-10">
            <div class="flex items-center gap-3 mb-6">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-church-gold/10 text-yellow-700 border border-church-gold/20">
                    Renungan Harian {{ $devotion->devotionCategory }}
                </span>
                <div class="flex items-center gap-2 flex-wrap">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-gray-50 border border-gray-200 text-xs font-medium text-gray-600">
                        <i class="fas fa-calendar-alt text-church-gold"></i>
                        {{ $devotion->date_formatted }}
                    </div>
                    @if($devotion->updated_at && $devotion->updated_at != $devotion->created_at)
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-blue-50 border border-blue-200 text-xs font-medium text-blue-600">
                            <i class="fas fa-edit"></i>
                            Terakhir Disunting: {{ $devotion->updated_at_local }}
                        </div>
                    @endif
                </div>
            </div>
            <h1 class="text-xl md:text-2xl font-bold text-church-dark leading-tight mb-2">
                {{ $devotion->title }}
            </h1>
            <div class="flex items-center gap-3 mb-6">
                <div class="font-bold text-church-dark text-base">Nats Alkitab:
                    {{ $devotion->bible_verse }}
                </div>
            </div>
            <div class="flex items-center gap-4 mb-6 pb-6 border-b border-gray-100">
                <div class="h-10 w-10 rounded-full bg-church-gold/10 border border-church-gold/20 flex items-center justify-center text-church-gold text-xl font-bold">
                    <i class="fa fa-user text-sm"></i>
                </div>  
                <div>
                    <div class="font-bold text-church-dark text-base">{{ $devotion->author }}</div>
                </div>
            </div>
            <div class="prose prose-lg prose-gray max-w-none prose-p:leading-loose prose-p:text-gray-700">
                {!! nl2br(e($devotion->content)) !!}
            </div>
        </div>
    </div>
</div>
@endsection
