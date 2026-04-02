@extends('components.admin.layout')

@section('page_title', 'Kelola Rayon')

@section('title', 'Admin - Rayon')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="{{ route('admin.region.index') }}" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
            <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
                <i class="fas fa-arrow-left"></i>
            </div>
            Kembali
        </a>
        <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Detail Rayon</h2>
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <div class="md:col-span-1 space-y-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden text-center">
            <div class="h-20 bg-gradient-to-r from-church-gold to-yellow-600"></div>
            <div class="relative px-6 pb-6 -mt-10">
                <div class="w-20 h-20 rounded-2xl bg-white p-1.5 mx-auto shadow-md mb-4 flex items-center justify-center border border-gray-100">
                    <div class="w-full h-full rounded-xl bg-gradient-to-br from-church-gold to-yellow-600 flex items-center justify-center text-2xl text-church-dark">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-church-dark">Rayon {{ $region->name }}</h3>
                <div class="mt-6 p-4 bg-gray-50 rounded-xl border border-gray-100">
                    <div class="text-3xl font-bold text-church-dark mb-1">{{ $members->count() }}</div>
                    <div class="text-xs font-semibold text-gray-500 uppercase tracking-widest">Total Jemaat</div>
                </div>
            </div>
        </div>
    </div>
    <div class="md:col-span-2 space-y-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-church-warm/20">
                <h3 class="text-xl font-bold text-church-dark flex items-center gap-2">
                    Deskripsi Rayon
                </h3>
            </div>
            <div class="p-6">
                <p class="text-base text-gray-700 leading-relaxed">
                    {{ $region->description }}
                </p>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                <h3 class="text-xl font-bold text-church-dark">Anggota Rayon</h3>
            </div>
            <div class="p-4 space-y-3 relative">
                @forelse ($members as $member)
                <div class="flex items-center gap-4 p-3 hover:bg-gray-50 rounded-xl transition-colors border border-transparent hover:border-gray-100">
                    <div class="h-10 w-10 rounded-full bg-blue-50 text-blue-700 flex items-center justify-center font-bold text-sm">BS</div>
                    <div class="flex-1">
                        <div class="font-bold text-church-dark text-sm">{{ $member->name }}</div>
                        <div class="text-xs text-gray-500 mt-0.5">{{ $member->memberStatus }} • {{ $member->address }}</div>
                    </div>
                </div>
                @empty
                <p class="text-sm text-gray-500 text-center py-6">Belum ada anggota jemaat yang terdaftar di rayon ini.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
