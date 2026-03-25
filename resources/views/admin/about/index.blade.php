@extends('components.admin.layout')
@section('page_title', 'Informasi Gereja')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
    <div>
        <h2 class="text-3xl font-serif font-bold text-church-dark">Tentang Gereja</h2>
        <p class="text-sm text-gray-500 mt-2 font-sans flex items-center gap-2">
            <i class="fas fa-info-circle text-church-gold"></i> Kelola visi, misi, tema tahunan, dan profil esensial gereja.
        </p>
    </div>
    
    <div class="flex flex-col sm:flex-row items-center gap-3 w-full md:w-auto">
        <a href="{{ route('admin.about.create') }}" class="w-full sm:w-auto justify-center bg-gradient-to-r from-church-gold to-yellow-600 hover:from-yellow-500 hover:to-yellow-700 text-church-dark px-5 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
            <i class="fas fa-plus"></i> Tambah Informasi
        </a>
    </div>
</div>

<!-- Data Cards Container (Using grid because content is mostly text) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pb-20">
    
    <!-- Item 1: Visi -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:border-church-gold/30 hover:shadow-md transition-all flex flex-col h-full">
        <div class="p-6 flex-1">
            <div class="flex justify-between items-start mb-4">
                <div class="h-12 w-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl shadow-sm border border-blue-100">
                    <i class="fas fa-eye"></i>
                </div>
                <!-- Actions -->
                <div class="flex space-x-2 transition-opacity">
                    <button title="Detail" class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors border border-blue-100">
                        <i class="fas fa-expand-arrows-alt w-4 text-center"></i>
                    </button>
                    <button title="Edit" class="text-church-dark hover:text-yellow-800 bg-church-gold/10 hover:bg-church-gold/30 p-2 rounded-lg transition-colors border border-church-gold/30">
                        <i class="fas fa-edit w-4 text-center"></i>
                    </button>
                    <button title="Hapus" onclick="confirmDelete(1)" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors border border-red-100">
                        <i class="fas fa-trash-alt w-4 text-center"></i>
                    </button>
                </div>
            </div>
            
            <h3 class="text-xl font-serif font-bold text-church-dark mb-3 group-hover:text-church-gold transition-colors">Visi GKI</h3>
            <p class="text-sm text-gray-600 leading-relaxed line-clamp-4">
                Menjadi gereja yang menghadirkan damai sejahtera Allah bagi sesama dan alam semesta melalui persekutuan yang bersaksi dan melayani.
            </p>
        </div>
        <div class="bg-gray-50/50 border-t border-gray-50 px-6 py-3 text-xs text-gray-400 font-medium flex items-center gap-1.5">
            <i class="far fa-clock"></i> Diperbarui 2 bulan lalu
        </div>
    </div>

    <!-- Item 2: Misi -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:border-church-gold/30 hover:shadow-md transition-all flex flex-col h-full">
        <div class="p-6 flex-1">
            <div class="flex justify-between items-start mb-4">
                <div class="h-12 w-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center text-xl shadow-sm border border-green-100">
                    <i class="fas fa-bullseye"></i>
                </div>
                <!-- Actions -->
                <div class="flex space-x-2 transition-opacity">
                    <button title="Detail" class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors border border-blue-100">
                        <i class="fas fa-expand-arrows-alt w-4 text-center"></i>
                    </button>
                    <button title="Edit" class="text-church-dark hover:text-yellow-800 bg-church-gold/10 hover:bg-church-gold/30 p-2 rounded-lg transition-colors border border-church-gold/30">
                        <i class="fas fa-edit w-4 text-center"></i>
                    </button>
                    <button title="Hapus" onclick="confirmDelete(2)" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors border border-red-100">
                        <i class="fas fa-trash-alt w-4 text-center"></i>
                    </button>
                </div>
            </div>
            
            <h3 class="text-xl font-serif font-bold text-church-dark mb-3 group-hover:text-church-gold transition-colors">Misi GKI</h3>
            <p class="text-sm text-gray-600 leading-relaxed line-clamp-4">
                Mengembangkan spiritualitas jemaat yang berpusat pada Kristus. Membangun persekutuan yang inklusif dan saling peduli. Mewujudkan keadilan, perdamaian, dan keutuhan ciptaan.
            </p>
        </div>
        <div class="bg-gray-50/50 border-t border-gray-50 px-6 py-3 text-xs text-gray-400 font-medium flex items-center gap-1.5">
            <i class="far fa-clock"></i> Diperbarui 2 bulan lalu
        </div>
    </div>

    <!-- Item 3: Tema Sinode -->
    <div class="bg-gradient-to-br from-church-dark to-slate-900 rounded-2xl shadow-md border border-church-gold/20 overflow-hidden group hover:shadow-lg transition-all flex flex-col h-full relative">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-church-gold rounded-full filter blur-[60px] opacity-20"></div>
        <div class="p-6 flex-1 relative z-10">
            <div class="flex justify-between items-start mb-4">
                <div class="h-12 w-12 rounded-xl bg-white/10 text-church-gold flex items-center justify-center text-xl shadow-sm border border-white/20 backdrop-blur-md">
                    <i class="fas fa-flag"></i>
                </div>
                <!-- Actions -->
                <div class="flex space-x-2 transition-opacity">
                    <button title="Detail" class="text-white hover:text-blue-200 bg-white/10 hover:bg-white/20 p-2 rounded-lg transition-colors border border-white/10">
                        <i class="fas fa-expand-arrows-alt w-4 text-center"></i>
                    </button>
                    <button title="Edit" class="text-church-gold hover:text-yellow-300 bg-church-gold/20 hover:bg-church-gold/30 p-2 rounded-lg transition-colors border border-church-gold/30">
                        <i class="fas fa-edit w-4 text-center"></i>
                    </button>
                    <button title="Hapus" onclick="confirmDelete(3)" class="text-red-400 hover:text-red-300 bg-red-500/10 hover:bg-red-500/20 p-2 rounded-lg transition-colors border border-red-500/20">
                        <i class="fas fa-trash-alt w-4 text-center"></i>
                    </button>
                </div>
            </div>
            
            <h3 class="text-xl font-serif font-bold text-white mb-3">Tema Pelayanan Jemaat 2026</h3>
            <p class="text-sm text-white/70 leading-relaxed line-clamp-4 font-medium">
                "DIPERLENGKAPI UNTUK MELAYANI" <br> (Bdk. Efesus 4:11-12)
            </p>
        </div>
        <div class="bg-black/20 border-t border-white/10 px-6 py-3 text-xs text-white/40 font-medium flex items-center gap-1.5 relative z-10">
            <i class="far fa-star"></i> Item Sorotan (Highlight)
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Hapus Informasi?',
            text: "Data ini akan dihapus secara permanen!",
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
                    text: 'Informasi gereja sukses dihapus.',
                    icon: 'success',
                    customClass: { popup: 'rounded-2xl', confirmButton: 'font-sans font-bold rounded-xl bg-church-gold hover:bg-yellow-600 text-church-dark px-6 py-2' }
                });
            }
        })
    }
</script>
@endsection
