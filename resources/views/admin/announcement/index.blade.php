@extends('components.admin.layout')

@section('page_title', 'Kelola Warta Jemaat')

@section('title', 'Admin - Warta Jemaat')

@section('content')
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
    <div>
        <h2 class="text-3xl font-serif font-bold text-church-dark">Warta Jemaat</h2>
        <p class="text-sm text-gray-500 mt-2 font-sans flex items-center gap-2">
            <i class="fas fa-info-circle text-church-gold"></i>Kelola data warta jemaat beserta informasi kegiatan lainnya.
        </p>
    </div>
    <div class="flex flex-col sm:flex-row items-center gap-3 w-full md:w-auto">
        <div class="relative w-full sm:w-auto">
            <input type="text" placeholder="Cari warta jemaat..." class="w-full sm:w-64 pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all shadow-sm text-sm">
            <i class="fas fa-search absolute left-3.5 top-3 text-gray-400"></i>
        </div>
        <a href="{{ route('admin.announcement.create') }}" class="w-full sm:w-auto justify-center bg-gradient-to-r from-church-gold to-yellow-600 hover:from-yellow-500 hover:to-yellow-700 text-church-dark px-5 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
            <i class="fas fa-plus"></i>Tambah Warta Jemaat
        </a>
    </div>
</div>
<div class="flex gap-2 overflow-x-auto pb-4 mb-2 scrollbar-hide">
    
    <a href="{{ request()->fullUrlWithQuery(['filter' => 'all']) }}"
        class="px-5 py-2 rounded-xl text-sm font-bold whitespace-nowrap shadow-sm
        {{ request('filter', 'all') == 'all' ? 'bg-church-dark text-white' : 'bg-white border border-gray-200 text-gray-600' }}">
            Semua Warta
    </a>

    <a href="{{ request()->fullUrlWithQuery(['filter' => 'active']) }}"
        class="px-5 py-2 rounded-xl text-sm font-medium whitespace-nowrap
        {{ request('filter') == 'active' ? 'bg-church-dark text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50' }}">
            Aktif / Ditayangkan
    </a>

    <a href="{{ request()->fullUrlWithQuery(['filter' => 'expired']) }}"
        class="px-5 py-2 rounded-xl text-sm font-medium whitespace-nowrap
        {{ request('filter') == 'expired' ? 'bg-church-dark text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50' }}">
            Kedaluwarsa
    </a>

</div>
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse whitespace-nowrap">
            <thead>
                <tr class="bg-gray-50/50 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                    <th class="px-6 py-4 font-bold">Judul Warta</th>
                    <th class="px-6 py-4 font-bold">Kategori</th>
                    <th class="px-6 py-4 font-bold">Periode Tayang</th>
                    <th class="px-6 py-4 font-bold">Status</th>
                    <th class="px-6 py-4 font-bold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 text-sm">
                @forelse ($announcements as $announcement)
                <tr class="hover:bg-church-warm/30 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            @if($announcement->image_url)
                                <img src="{{ asset('storage/' . $announcement->image_url) }}"
                                    class="h-12 w-16 rounded-lg object-cover border border-gray-200 shrink-0" 
                                    alt="Gambar Warta">
                            @else
                                <div class="h-12 w-16 rounded-lg bg-gray-100 border border-gray-200 flex items-center justify-center overflow-hidden shrink-0">
                                    <i class="fas fa-image text-gray-300 text-lg"></i>
                                </div>
                            @endif
                            <div>
                                <div class="font-bold text-church-dark text-base truncate max-w-[300px] inline-block transition-colors pb-0.5">{{ $announcement->title }}</div>
                                <div class="text-xs text-gray-500 mt-1 truncate max-w-[200px]">{{ $announcement->content }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-800">{{ $announcement->category }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-800">{{ $announcement->date_start }} - {{ $announcement->date_end }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold 
                            {{ $announcement->is_date_active 
                                ? 'bg-green-50 text-green-700 border-green-100' 
                                : 'bg-red-50 text-red-700 border-red-100' }}">
                            <span class="w-1.5 h-1.5 rounded-full 
                                {{ $announcement->is_date_active ? 'bg-green-500 animate-pulse' : 'bg-red-500' }}">
                            </span>
                            {{ $announcement->is_date_active ? 'Berjalan' : 'Berakhir' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center space-x-2 transition-opacity">
                            <a href="{{ route('admin.announcement.show', $announcement->id) }}" title="Detail" class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors border border-blue-100">
                                <i class="fas fa-eye w-4 text-center"></i>
                            </a>
                            <a href="{{ route('admin.announcement.edit', $announcement->id) }}" title="Edit" class="text-church-dark hover:text-yellow-800 bg-church-gold/10 hover:bg-church-gold/30 p-2 rounded-lg transition-colors border border-church-gold/30">
                                <i class="fas fa-edit w-4 text-center"></i>
                            </a>
                            <form id="delete-form-{{ $announcement->id }}" action="{{ route('admin.announcement.destroy', $announcement->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" title="Hapus" onclick="confirmDelete({{ $announcement->id }})" class="cursor-pointer text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors border border-red-100">
                                    <i class="fas fa-trash-alt w-4 text-center"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        <div class="flex flex-col items-center gap-3 py-10">
                            <i class="fas fa-users text-4xl text-gray-300"></i>
                            <p class="text-sm">Belum ada data warta jemaat yang ditambahkan. Klik tombol "Tambah Warta Jemaat" untuk memulai.</p>
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
        Menampilkan {{ $announcements->firstItem() ?? 0 }} hingga {{ $announcements->lastItem() ?? 0 }} data dari total {{ $announcements->total() }} data
    </span>
    <div class="flex flex-wrap justify-center gap-1">
        @if ($announcements->onFirstPage())
            <span class="px-3 py-1 text-sm border border-gray-200 rounded-md text-gray-400 cursor-not-allowed hidden sm:block">
                Sebelumnya
            </span>
        @else
            <a href="{{ $announcements->previousPageUrl() }}" class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 hidden sm:block">
                Sebelumnya
            </a>
        @endif

        @foreach ($announcements->getUrlRange(1, $announcements->lastPage()) as $page => $url)
            @if ($page == $announcements->currentPage())
                <span class="px-3 py-1 text-sm border border-church-gold rounded-md bg-church-gold/10 text-church-dark font-medium">
                    {{ $page }}
                </span>
            @else
                <a href="{{ $url }}" class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50">
                    {{ $page }}
                </a>
            @endif
        @endforeach

        @if ($announcements->hasMorePages())
            <a href="{{ $announcements->nextPageUrl() }}" class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 hidden sm:block">
                Berikutnya
            </a>
        @else
            <span class="px-3 py-1 text-sm border border-gray-200 rounded-md text-gray-400 cursor-not-allowed hidden sm:block">
                Berikutnya
            </span>
        @endif
    </div>
@endsection
