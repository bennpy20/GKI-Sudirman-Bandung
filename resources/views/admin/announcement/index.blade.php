@extends('components.admin.layout')
@section('page_title', 'Data Warta Jemaat')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
    <div>
        <h2 class="text-3xl font-serif font-bold text-church-dark">Warta Jemaat</h2>
        <p class="text-sm text-gray-500 mt-2 font-sans flex items-center gap-2">
            <i class="fas fa-bullhorn text-church-gold"></i> Kelola pengumuman dan berita kategorial.
        </p>
    </div>
    
    <div class="flex flex-col sm:flex-row items-center gap-3 w-full md:w-auto">
        <div class="relative w-full sm:w-auto">
            <input type="text" placeholder="Cari warta..." class="w-full sm:w-64 pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all shadow-sm text-sm">
            <i class="fas fa-search absolute left-3.5 top-3 text-gray-400"></i>
        </div>
        <a href="{{ route('admin.announcement.create') }}" class="w-full sm:w-auto justify-center bg-gradient-to-r from-church-gold to-yellow-600 hover:from-yellow-500 hover:to-yellow-700 text-church-dark px-5 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
            <i class="fas fa-plus"></i> Buat Warta
        </a>
    </div>
</div>

<!-- Tabs/Filters -->
<div class="flex gap-2 overflow-x-auto pb-4 mb-2 scrollbar-hide">
    <button class="px-5 py-2 bg-church-dark text-white rounded-xl text-sm font-bold whitespace-nowrap shadow-sm">Semua Warta</button>
    <button class="px-5 py-2 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 rounded-xl text-sm font-medium whitespace-nowrap transition-colors">Aktif / Ditayangkan</button>
    <button class="px-5 py-2 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 rounded-xl text-sm font-medium whitespace-nowrap transition-colors">Kedaluwarsa</button>
</div>

<!-- Data Table Container -->
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
                <!-- Data Row 1 -->
                <tr class="hover:bg-church-warm/30 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <!-- Image thumbnail fallback mockup -->
                            <div class="h-12 w-16 rounded-lg bg-gray-100 border border-gray-200 flex items-center justify-center overflow-hidden shrink-0">
                                <i class="fas fa-image text-gray-300 text-lg"></i>
                            </div>
                            <div>
                                <div class="font-bold text-church-dark text-base border-b border-dotted border-gray-300 hover:border-church-gold hover:text-yellow-700 cursor-pointer inline-block transition-colors pb-0.5">Aksi Donor Darah Jemaat 2026</div>
                                <div class="text-xs text-gray-500 mt-1 truncate max-w-[200px]">Diadakan bekerjasama dengan PMI Kota...</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-bold bg-blue-50 text-blue-700 border border-blue-100">
                            Diakonia
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-800">1 Mei - 15 Mei 2026</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-green-50 text-green-700 border border-green-100">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span> Tayang
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center space-x-2 transition-opacity">
                            <button title="Detail" class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors border border-blue-100">
                                <i class="fas fa-eye w-4 text-center"></i>
                            </button>
                            <button title="Edit" class="text-church-dark hover:text-yellow-800 bg-church-gold/10 hover:bg-church-gold/30 p-2 rounded-lg transition-colors border border-church-gold/30">
                                <i class="fas fa-edit w-4 text-center"></i>
                            </button>
                            <button title="Hapus" onclick="confirmDelete(1)" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors border border-red-100">
                                <i class="fas fa-trash-alt w-4 text-center"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Data Row 2 -->
                <tr class="hover:bg-church-warm/30 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <div class="h-12 w-16 rounded-lg bg-gray-100 border border-gray-200 flex items-center justify-center overflow-hidden shrink-0">
                                <i class="fas fa-image text-gray-300 text-lg"></i>
                            </div>
                            <div>
                                <div class="font-bold text-church-dark text-base border-b border-dotted border-gray-300 hover:border-church-gold hover:text-yellow-700 cursor-pointer inline-block transition-colors pb-0.5">Penelaahan Alkitab (PA) Wilayah II</div>
                                <div class="text-xs text-gray-500 mt-1 truncate max-w-[200px]">PA gabungan untuk seluruh anggota wilayah...</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-bold bg-purple-50 text-purple-700 border border-purple-100">
                            Pembinaan
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-800">10 Apr - 15 Apr 2026</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-600 border border-gray-200 tracking-wider">
                            Selesai
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center space-x-2 transition-opacity">
                            <button title="Detail" class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors border border-blue-100">
                                <i class="fas fa-eye w-4 text-center"></i>
                            </button>
                            <button title="Edit" class="text-church-dark hover:text-yellow-800 bg-church-gold/10 hover:bg-church-gold/30 p-2 rounded-lg transition-colors border border-church-gold/30">
                                <i class="fas fa-edit w-4 text-center"></i>
                            </button>
                            <button title="Hapus" onclick="confirmDelete(2)" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors border border-red-100">
                                <i class="fas fa-trash-alt w-4 text-center"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t border-gray-50 bg-gray-50/30 flex flex-col md:flex-row justify-between items-center gap-4">
        <span class="text-xs text-gray-500 font-medium text-center md:text-left">Menampilkan 1 hingga 2 dari 10 warta</span>
        <div class="flex flex-wrap justify-center gap-1">
            <button class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-400 cursor-not-allowed hidden sm:block">Sebelumnya</button>
            <button class="px-3 py-1 text-sm border border-church-gold rounded-md bg-church-gold/10 text-church-dark font-medium">1</button>
            <button class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50">2</button>
            <button class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 hidden sm:block">Berikutnya</button>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Hapus Warta?',
            text: "Warta yang dihapus tidak dapat ditampilkan lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#a1a1aa',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            customClass: {
                confirmButton: 'font-sans font-bold rounded-xl px-5 py-2.5',
                cancelButton: 'font-sans font-bold rounded-xl px-5 py-2.5',
                popup: 'rounded-2xl shadow-xl border border-gray-100'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Dihapus!',
                    text: 'Data warta telah dihapus.',
                    icon: 'success',
                    customClass: { popup: 'rounded-2xl', confirmButton: 'font-sans font-bold rounded-xl bg-church-gold hover:bg-yellow-600 text-church-dark px-6 py-2' }
                });
            }
        })
    }
</script>
@endsection
