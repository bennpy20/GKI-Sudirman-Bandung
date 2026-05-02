@extends('components.admin.layout')

@section('page_title', 'Kelola Kalender Liturgi')

@section('title', 'Admin - Kalender Liturgi')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="{{ route('admin.liturgical_calendar.index') }}" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
            <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
                <i class="fas fa-arrow-left"></i>
            </div>
            Kembali
        </a>
        <h2 class="text-3xl font-bold text-church-dark mt-1">Detail Pekan Liturgi</h2>
    </div>
</div>
<!-- Ganti warna -->
@php
$key = strtolower(trim($liturgical_calendar->color));
$colors = [
    'ungu' => [
        'header' => 'bg-purple-600',
        'iconBg' => 'bg-purple-50 text-purple-600',
        'badge' => 'bg-purple-50 text-purple-700 border-purple-100',
        'dot' => 'bg-purple-600',
    ],
    'hijau' => [
        'header' => 'bg-green-600',
        'iconBg' => 'bg-green-50 text-green-600',
        'badge' => 'bg-green-50 text-green-700 border-green-100',
        'dot' => 'bg-green-600',
    ],
    'merah' => [
        'header' => 'bg-red-600',
        'iconBg' => 'bg-red-50 text-red-600',
        'badge' => 'bg-red-50 text-red-700 border-red-100',
        'dot' => 'bg-red-600',
    ],
    'putih' => [
        'header' => 'bg-gray-50',
        'iconBg' => 'bg-gray-50 text-gray-500',
        'badge' => 'bg-gray-50 text-gray-700 border-gray-200',
        'dot' => 'bg-gray-200',
    ],
    'hitam' => [
        'header' => 'bg-gray-900',
        'iconBg' => 'bg-gray-800 text-white',
        'badge' => 'bg-gray-900 text-white border-gray-800',
        'dot' => 'bg-black',
    ],
];
$color = $colors[$key] ?? $colors['putih'];
@endphp
<div class="md:col-span-1 space-y-6">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden text-center">
        <div class="h-24 {{ $color['header'] }} relative">
            <div class="absolute inset-0 bg-black/10"></div>
        </div>
        <div class="relative px-6 pb-6 -mt-12">
            <div class="w-24 h-24 rounded-2xl bg-white p-1.5 mx-auto shadow-md mb-4 flex items-center justify-center border border-gray-100 relative z-10">
                <div class="w-full h-full rounded-xl {{ $color['iconBg'] }} flex items-center justify-center text-3xl">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </div>
            
            <h3 class="text-2xl font-bold text-church-dark">{{ $liturgical_calendar->name }}</h3>
            <span class="inline-flex items-center gap-2 mt-2 px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-600 border border-gray-200 shadow-sm">
                <span class="w-2 h-2 rounded-full {{ $color['dot'] }}"></span> Warna: {{ ucfirst($liturgical_calendar->color) }}
            </span>
        </div>
    </div>
</div>
@endsection
