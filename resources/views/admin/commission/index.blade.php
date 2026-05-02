@extends('components.admin.layout')

@section('page_title', 'Kelola Komisi')

@section('title', 'Admin - Komisi')

@section('content')
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
    <div>
        <h2 class="text-3xl font-bold text-church-dark">Komisi</h2>
        <p class="text-sm text-gray-500 mt-2 font-sans flex items-center gap-2">
            <i class="fas fa-info-circle text-church-gold"></i> Kelola data komisi serta jadwal persekutuannya.
        </p>
    </div>
    <div class="flex flex-col sm:flex-row items-center gap-3 w-full md:w-auto">
        <form method="GET" action="{{ route('admin.commission.index') }}">
            <div class="relative w-full sm:w-auto">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama komisi..." class="w-full sm:w-64 pl-10 pr-10 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all shadow-sm text-sm">
                <i class="fas fa-search absolute left-3.5 top-3 text-gray-400"></i>
                @if(request('search'))
                    <a href="{{ route('admin.commission.index') }}" class="absolute right-3 top-2.5 text-gray-400 hover:text-church-gold transition">
                        <i class="fas fa-times-circle"></i>
                    </a>
                @endif
            </div>
        </form>
        <a href="{{ route('admin.commission.create') }}" class="w-full sm:w-auto justify-center bg-gradient-to-r from-church-gold to-yellow-600 hover:from-yellow-500 hover:to-yellow-700 text-church-dark px-5 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
            <i class="fas fa-plus"></i> Tambah Komisi
        </a>
    </div>
</div>
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-5 border-b border-gray-50 flex justify-between items-center bg-gray-50/30">
        <h3 class="font-bold text-church-dark text-lg">Daftar Komisi</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse whitespace-nowrap">
            <thead>
                <tr class="bg-white text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                    <th class="px-6 py-4 font-semibold">Nama Komisi</th>
                    <th class="px-6 py-4 font-semibold">Jadwal Persekutuan</th>
                    <th class="px-6 py-4 font-semibold">Ruangan</th>
                    <th class="px-6 py-4 font-semibold text-center w-32">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 text-sm">
                @forelse ($commissions as $commission)
                <tr class="hover:bg-church-warm/30 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div>
                                <div class="font-bold text-church-dark text-base">{{ $commission->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            {{ $commission->day }}, {{ substr($commission->time_start, 0, 5) }} - {{ substr($commission->time_end, 0, 5) }} WIB
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2 text-gray-600 text-sm">
                            {{ $commission->room }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center space-x-2 transition-opacity">
                            <a href="{{ route('admin.commission.show', $commission->id) }}" title="Detail" class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors border border-blue-100">
                                <i class="fas fa-eye w-4 text-center"></i>
                            </a>
                            <a href="{{ route('admin.commission.edit', $commission->id) }}" title="Edit" class="text-church-dark hover:text-yellow-800 bg-church-gold/10 hover:bg-church-gold/30 p-2 rounded-lg transition-colors border border-church-gold/30">
                                <i class="fas fa-edit w-4 text-center"></i>
                            </a>
                            <form id="delete-form-{{ $commission->id }}" action="{{ route('admin.commission.destroy', $commission->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" title="Hapus" onclick="confirmDelete({{ $commission->id }})" class="cursor-pointer text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors border border-red-100">
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
                            <i class="fas fa-users text-4xl text-gray-300"></i>
                            <p class="text-sm">Belum ada data komisi yang ditambahkan. Klik tombol "Tambah Komisi" untuk memulai.</p>
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
        Menampilkan {{ $commissions->firstItem() ?? 0 }} hingga {{ $commissions->lastItem() ?? 0 }} data dari total {{ $commissions->total() }} data
    </span>
    <div class="flex flex-wrap justify-center gap-1">
        @if ($commissions->onFirstPage())
            <span class="px-3 py-1 text-sm border border-gray-200 rounded-md text-gray-400 cursor-not-allowed hidden sm:block">
                Sebelumnya
            </span>
        @else
            <a href="{{ $commissions->previousPageUrl() }}" class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 hidden sm:block">
                Sebelumnya
            </a>
        @endif

        @foreach ($commissions->getUrlRange(1, $commissions->lastPage()) as $page => $url)
            @if ($page == $commissions->currentPage())
                <span class="px-3 py-1 text-sm border border-church-gold rounded-md bg-church-gold/10 text-church-dark font-medium">
                    {{ $page }}
                </span>
            @else
                <a href="{{ $url }}" class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50">
                    {{ $page }}
                </a>
            @endif
        @endforeach

        @if ($commissions->hasMorePages())
            <a href="{{ $commissions->nextPageUrl() }}" class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 hidden sm:block">
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
