@extends('components.admin.layout')
@section('page_title', 'Manajemen Penatalayan')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
    <div>
        <h2 class="text-3xl font-serif font-bold text-church-dark">Master Penatalayan</h2>
        <p class="text-sm text-gray-500 mt-2 font-sans flex items-center gap-2">
            <i class="fas fa-info-circle text-church-gold"></i> Kelola daftar peran pelayanan yang ada di gereja.
        </p>
    </div>
    
    <div class="flex flex-col sm:flex-row items-center gap-3 w-full md:w-auto">
        <div class="relative w-full sm:w-auto">
            <input type="text" placeholder="Cari peran..." class="w-full sm:w-64 pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all shadow-sm text-sm">
            <i class="fas fa-search absolute left-3.5 top-3 text-gray-400"></i>
        </div>
        <a href="#" class="w-full sm:w-auto justify-center bg-gradient-to-r from-church-gold to-yellow-600 hover:from-yellow-500 hover:to-yellow-700 text-church-dark px-5 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
            <i class="fas fa-plus"></i> Tambah Peran
        </a>
    </div>
</div>

<!-- Data Table Container -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-5 border-b border-gray-50 flex justify-between items-center bg-gray-50/30">
        <h3 class="font-bold text-church-dark text-lg">Daftar Peran Pelayanan</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse whitespace-nowrap">
            <thead>
                <tr class="bg-white text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                    <th class="px-6 py-4 font-semibold w-2/3">Nama Peran Pelayanan</th>
                    <th class="px-6 py-4 font-semibold text-center w-1/3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 text-sm">
                <!-- Data Row 1 -->
                <tr class="hover:bg-church-warm/30 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-church-dark to-slate-800 text-church-gold flex items-center justify-center font-bold text-sm shadow-sm">
                                <i class="fas fa-pray"></i>
                            </div>
                            <div>
                                <div class="font-bold text-church-dark text-base">Pengkhotbah</div>
                                <div class="text-xs text-gray-500 mt-0.5">Steward Role</div>
                            </div>
                        </div>
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
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-church-dark to-slate-800 text-church-gold flex items-center justify-center font-bold text-sm shadow-sm">
                                <i class="fas fa-music"></i>
                            </div>
                            <div>
                                <div class="font-bold text-church-dark text-base">Pemusik</div>
                                <div class="text-xs text-gray-500 mt-0.5">Steward Role</div>
                            </div>
                        </div>
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
        <span class="text-xs text-gray-500 font-medium text-center md:text-left">Menampilkan 1 hingga 2 dari 2 entri</span>
        <div class="flex flex-wrap justify-center gap-1">
            <button class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-400 cursor-not-allowed hidden sm:block">Sebelumnya</button>
            <button class="px-3 py-1 text-sm border border-church-gold rounded-md bg-church-gold/10 text-church-dark font-medium">1</button>
            <button class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-400 cursor-not-allowed hidden sm:block">Berikutnya</button>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Hapus Peran?',
            text: "Jemaat yang memiliki peran ini akan kehilangan data peran tersebut!",
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
                    text: 'Peran penatalayan telah dihapus.',
                    icon: 'success',
                    customClass: { popup: 'rounded-2xl', confirmButton: 'font-sans font-bold rounded-xl bg-church-gold hover:bg-yellow-600 text-church-dark px-6 py-2' }
                });
            }
        })
    }
</script>
@endsection
