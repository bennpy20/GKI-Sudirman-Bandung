@extends('components.admin.layout')
@section('page_title', 'Manajemen Jemaat')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
    <div>
        <h2 class="text-3xl font-serif font-bold text-church-dark">Data Jemaat</h2>
        <p class="text-sm text-gray-500 mt-2 font-sans flex items-center gap-2">
            <i class="fas fa-info-circle text-church-gold"></i> Kelola data seluruh jemaat gereja di sini.
        </p>
    </div>
    
    <div class="flex flex-col sm:flex-row items-center gap-3 w-full md:w-auto">
        <div class="relative w-full sm:w-auto">
            <input type="text" placeholder="Cari jemaat..." class="w-full sm:w-64 pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all shadow-sm text-sm">
            <i class="fas fa-search absolute left-3.5 top-3 text-gray-400"></i>
        </div>
        <a href="{{ route('admin.member.create') }}" class="w-full sm:w-auto justify-center bg-gradient-to-r from-church-gold to-yellow-600 hover:from-yellow-500 hover:to-yellow-700 text-church-dark px-5 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
            <i class="fas fa-plus"></i> Tambah Jemaat
        </a>
    </div>
</div>

<!-- Data Jemaat Container -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-5 border-b border-gray-50 flex justify-between items-center bg-gray-50/30">
        <h3 class="font-bold text-church-dark text-lg">Daftar Terbaru</h3>
        <button class="text-gray-400 hover:text-church-gold transition-colors text-sm font-medium flex items-center gap-2"><i class="fas fa-filter"></i> Filter</button>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse whitespace-nowrap">
            <thead>
                <tr class="bg-white text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                    <th class="px-6 py-4 font-semibold">Jemaat</th>
                    <th class="px-6 py-4 font-semibold">Kontak & Wilayah</th>
                    <th class="px-6 py-4 font-semibold">Jabatan</th>
                    <th class="px-6 py-4 font-semibold">Status</th>
                    <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 text-sm">
                <!-- Data Row 1 -->
                <tr class="hover:bg-church-warm/30 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-church-gold to-yellow-600 text-church-dark flex items-center justify-center font-bold text-sm shadow-sm border border-yellow-200">
                                BS
                            </div>
                            <div>
                                <div class="font-bold text-church-dark">Budi Santoso</div>
                                <div class="text-xs text-gray-500 mt-0.5">Sidi</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col gap-1">
                            <span class="text-gray-700"><i class="fas fa-phone-alt text-gray-400 w-4"></i> 081234567890</span>
                            <span class="text-xs text-gray-500"><i class="fas fa-map-marker-alt text-church-gold w-4"></i> Rayon Galilea</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-church-gold/20 text-yellow-800 border border-church-gold/30">
                            Penatua
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-green-500"></span>
                            <span class="font-medium text-gray-700">Aktif</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center space-x-2 transition-opacity">
                            <a href="#" title="Detail" class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors border border-blue-100">
                                <i class="fas fa-eye w-4 text-center"></i>
                            </a>
                            <a href="#" title="Edit" class="text-church-dark hover:text-yellow-800 bg-church-gold/10 hover:bg-church-gold/30 p-2 rounded-lg transition-colors border border-church-gold/30">
                                <i class="fas fa-edit w-4 text-center"></i>
                            </a>
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
                            <div class="h-10 w-10 rounded-full bg-gray-100 text-gray-600 flex items-center justify-center font-bold text-sm shadow-sm border border-gray-200">
                                MI
                            </div>
                            <div>
                                <div class="font-bold text-church-dark">Maria Irawan</div>
                                <div class="text-xs text-gray-500 mt-0.5">Baptis Dewasa</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col gap-1">
                            <span class="text-gray-700"><i class="fas fa-phone-alt text-gray-400 w-4"></i> 089876543210</span>
                            <span class="text-xs text-gray-500"><i class="fas fa-map-marker-alt text-church-gold w-4"></i> Rayon Yerusalem</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-gray-100 text-gray-600 border border-gray-200">
                            Jemaat Biasa
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-green-500"></span>
                            <span class="font-medium text-gray-700">Aktif</span>
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
        <span class="text-xs text-gray-500 font-medium text-center md:text-left">Menampilkan 1 hingga 2 dari 1,248 entri</span>
        <div class="flex flex-wrap justify-center gap-1">
            <button class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-400 cursor-not-allowed hidden sm:block">Sebelumnya</button>
            <button class="px-3 py-1 text-sm border border-church-gold rounded-md bg-church-gold/10 text-church-dark font-medium">1</button>
            <button class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50">2</button>
            <button class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50">3</button>
            <button class="px-3 py-1 text-sm border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 hidden sm:block">Berikutnya</button>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Hapus Data Jemaat?',
            text: "Tindakan ini tidak dapat dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#a1a1aa',
            confirmButtonText: 'Ya, Hapus Data',
            cancelButtonText: 'Batal',
            customClass: {
                confirmButton: 'font-sans font-bold rounded-xl px-5 py-2.5',
                cancelButton: 'font-sans font-bold rounded-xl px-5 py-2.5',
                popup: 'rounded-2xl shadow-xl border border-gray-100'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data jemaat telah dihapus.',
                    icon: 'success',
                    customClass: { popup: 'rounded-2xl', confirmButton: 'font-sans font-bold rounded-xl bg-church-gold hover:bg-yellow-600 text-church-dark px-6 py-2' }
                });
            }
        })
    }
</script>
@endsection