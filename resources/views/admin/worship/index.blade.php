@extends('components.admin.layout')

@section('page_title', 'Kelola Jadwal Kebaktian')

@section('title', 'Admin - Jadwal Kebaktian')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
    <div>
        <h2 class="text-3xl font-serif font-bold text-church-dark">Jadwal Kebaktian</h2>
        <p class="text-sm text-gray-500 mt-2 font-sans flex items-center gap-2">
            <i class="fas fa-info-circle text-church-gold"></i>Kelola jadwal kebaktian dan detailnya beserta daftar penatalayan.
        </p>
    </div>
    
    <div class="flex flex-col sm:flex-row items-center gap-3 w-full md:w-auto">
        <div class="relative w-full sm:w-auto">
            <input type="text" placeholder="Cari jadwal kebaktian..." class="w-full sm:w-64 pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all shadow-sm text-sm">
            <i class="fas fa-search absolute left-3.5 top-3 text-gray-400"></i>
        </div>
        <a href="{{ route('admin.worship.create') }}" class="w-full sm:w-auto justify-center bg-gradient-to-r from-church-gold to-yellow-600 hover:from-yellow-500 hover:to-yellow-700 text-church-dark px-5 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
            <i class="fas fa-plus"></i>Tambah Jadwal Kebaktian
        </a>
    </div>
</div>

<!-- Data Table Container -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-5 border-b border-gray-50 flex justify-between items-center bg-gray-50/30">
        <h3 class="font-bold text-church-dark text-lg">Jadwal Terdaftar</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse whitespace-nowrap">
            <thead>
                <tr class="bg-white text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                    <th class="px-6 py-4 font-semibold">Informasi Kebaktian</th>
                    <th class="px-6 py-4 font-semibold">Bacaan Alkitab</th>
                    <th class="px-6 py-4 font-semibold">Waktu dan Kategori</th>
                    <th class="px-6 py-4 font-semibold text-center w-1/5">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 text-sm">
                @forelse ($worships as $worship)
                <tr class="hover:bg-church-warm/30 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div>
                                <div class="font-bold text-church-dark text-base inline-block transition-colors pb-0.5 truncate max-w-[300px]">{{ $worship->title }}</div>
                                <div class="text-xs text-gray-500 mt-1 flex items-center gap-2">
                                    @if ($worship->liturgical_calendars)
                                        <!-- Ganti warna -->
                                        @php
                                            $colors = [
                                                'Ungu' => ['bg-purple-50 text-purple-700 border-purple-100', 'bg-purple-600'],
                                                'Hijau' => ['bg-green-50 text-green-700 border-green-100', 'bg-green-600'],
                                                'Merah' => ['bg-red-50 text-red-700 border-red-100', 'bg-red-600'],
                                                'Putih' => ['bg-gray-50 text-gray-700 border-gray-200', 'bg-gray-200'],
                                                'Hitam' => ['bg-gray-500 text-white border-gray-800', 'bg-black'],
                                            ];
                                            [$colorClass, $dot] = $colors[$worship->liturgical_calendars->color] ?? ['bg-gray-50 text-gray-700 border-gray-200', 'bg-gray-400'];
                                        @endphp
                                        <span class="inline-flex items-center gap-1 text-[10px] font-bold px-1.5 py-0.5 rounded-md border {{ $colorClass }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $dot }}"></span>{{ $worship->liturgical_calendars->name }}</span>
                                    @endif
                                    @if ($worship->video_url)
                                        <i class="fab fa-youtube text-red-500 ml-1"></i>Link Youtube tersedia
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 truncate max-w-[200px]">
                        <span class="text-gray-700">{{ $worship->bible_verse }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col gap-1">
                            <span class="text-gray-700">{{ $worship->date_formatted }}</span>
                            <span class="text-xs text-gray-500">{{ $worship->category_label }} ({{ $worship->time_formatted }})</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center space-x-2 transition-opacity">
                            <a href="{{ route('admin.worship.show', $worship->id) }}" title="Detail" class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors border border-blue-100">
                                <i class="fas fa-eye w-4 text-center"></i>
                            </a>
                            <a href="{{ route('admin.worship.edit', $worship->id) }}" title="Edit" class="text-church-dark hover:text-yellow-800 bg-church-gold/10 hover:bg-church-gold/30 p-2 rounded-lg transition-colors border border-church-gold/30">
                                <i class="fas fa-edit w-4 text-center"></i>
                            </a>
                            <form id="delete-form-{{ $worship->id }}" action="{{ route('admin.worship.destroy', $worship->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" title="Hapus" onclick="confirmDelete({{ $worship->id }})" class="cursor-pointer text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors border border-red-100">
                                    <i class="fas fa-trash-alt w-4 text-center"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                        <div class="flex flex-col items-center gap-3 py-10">
                            <i class="fas fa-church text-4xl text-gray-300"></i>
                            <p class="text-sm">Belum ada data jadwal kebaktian yang ditambahkan. Klik tombol "Tambah Jadwal Kebaktian" untuk memulai.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-gray-50 bg-gray-50/30 flex flex-col md:flex-row justify-between items-center gap-4">
    <!-- Pagination -->
    <span class="text-xs text-gray-500 font-medium text-center md:text-left">
        Menampilkan {{ $worships->firstItem() ?? 0 }} hingga {{ $worships->lastItem() ?? 0 }} data dari total {{ $worships->total() }} data
    </span>
    <div class="flex flex-wrap justify-center gap-1">
        @if ($worships->onFirstPage())
            <span class="px-3 py-1 text-sm border border-gray-200 rounded-md text-gray-400 cursor-not-allowed hidden sm:block">
                Sebelumnya
            </span>
        @else
            <a href="{{ $worships->previousPageUrl() }}" class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 hidden sm:block">
                Sebelumnya
            </a>
        @endif

        @foreach ($worships->getUrlRange(1, $worships->lastPage()) as $page => $url)
            @if ($page == $worships->currentPage())
                <span class="px-3 py-1 text-sm border border-church-gold rounded-md bg-church-gold/10 text-church-dark font-medium">
                    {{ $page }}
                </span>
            @else
                <a href="{{ $url }}" class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50">
                    {{ $page }}
                </a>
            @endif
        @endforeach

        @if ($worships->hasMorePages())
            <a href="{{ $worships->nextPageUrl() }}" class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 hidden sm:block">
                Berikutnya
            </a>
        @else
            <span class="px-3 py-1 text-sm border border-gray-200 rounded-md text-gray-400 cursor-not-allowed hidden sm:block">
                Berikutnya
            </span>
        @endif
    </div>
</div>

@endsection
