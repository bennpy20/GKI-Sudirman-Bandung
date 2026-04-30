@extends('components.admin.layout')

@section('page_title', 'Kelola Pengkhotbah')

@section('title', 'Admin - Pengkhotbah')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="{{ route('admin.preacher.index') }}" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
            <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
                <i class="fas fa-arrow-left"></i>
            </div>
            Kembali
        </a>
        <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Detail Pengkhotbah</h2>
    </div>
</div>
<div class="w-full mx-auto">
    <div class="lg:col-span-1 space-y-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden text-center relative">
            <div class="h-24 bg-gradient-to-r from-church-gold to-yellow-600"></div>
            <div class="relative px-6 pb-6 -mt-12">
                <div class="w-24 h-24 rounded-full bg-white p-1 mx-auto shadow-md mb-4 flex items-center justify-center border border-gray-100 relative">
                    <div class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center text-3xl font-bold text-gray-400">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-church-dark">{{ $preacher->name }}</h3>
                <p class="text-sm font-medium text-gray-500 mt-2">{{ $preacher->base }}</p>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
