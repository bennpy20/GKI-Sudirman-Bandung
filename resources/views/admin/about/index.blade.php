@extends('components.admin.layout')

@section('page_title', 'Kelola Profil Gereja')

@section('title', 'Admin - Profil Gereja')

@section('content')
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
    <div>
        <h2 class="text-3xl font-serif font-bold text-church-dark">Profil Gereja</h2>
        <p class="text-sm text-gray-500 mt-2 font-sans flex items-center gap-2">
            <i class="fas fa-info-circle text-church-gold"></i>Kelola visi, misi, tema, dan profil gereja lainnya.
        </p>
    </div>
    
    <div class="flex flex-col sm:flex-row items-center gap-3 w-full md:w-auto">
        <a href="{{ route('admin.about.create') }}" class="w-full sm:w-auto justify-center bg-gradient-to-r from-church-gold to-yellow-600 hover:from-yellow-500 hover:to-yellow-700 text-church-dark px-5 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
            <i class="fas fa-plus"></i>Tambah Profil
        </a>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pb-20">
    
    @forelse ($abouts as $about)
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:border-church-gold/30 hover:shadow-md transition-all flex flex-col h-full">
        <div class="p-6 flex-1">
            <div class="flex justify-between items-start mb-4">
                <div class="h-12 w-12 rounded-xl bg-church-gold text-church-dark flex items-center justify-center text-xl shadow-sm border border-church-gold/30">
                    <p class="font-bold">{{ $loop->iteration }}</p>
                </div>
                <div class="flex space-x-2 transition-opacity">
                    <a href="{{ route('admin.about.show', $about->id) }}" title="Detail" class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors border border-blue-100">
                        <i class="fas fa-eye w-6 text-center"></i>
                    </a>
                    <a href="{{ route('admin.about.edit', $about->id) }}" title="Edit" class="text-church-dark hover:text-yellow-800 bg-church-gold/10 hover:bg-church-gold/30 p-2 rounded-lg transition-colors border border-church-gold/30">
                        <i class="fas fa-edit w-6 text-center"></i>
                    </a>
                    <form id="delete-form-{{ $about->id }}" action="{{ route('admin.about.destroy', $about->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" title="Hapus" onclick="confirmDelete({{ $about->id }})" class="cursor-pointer text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors border border-red-100">
                            <i class="fas fa-trash-alt w-6 text-center"></i>
                        </button>
                    </form>
                </div>
            </div>
            <h3 class="text-xl font-serif font-bold pt-2 text-church-dark group-hover:text-church-gold transition-colors">{{ $about->name }}</h3>
            <p class="text-sm text-gray-600 leading-relaxed line-clamp-3 whitespace-pre-line">
                {{ $about->description }}
            </p>
        </div>
    </div>
    @empty
    <div class="col-span-full bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 p-4 rounded-lg flex items-center gap-3">
        <i class="fas fa-exclamation-triangle text-yellow-500"></i>
        <p class="text-sm">Belum ada data profil gereja yang ditambahkan. Klik tombol "Tambah Profil" untuk memulai.</p>
    </div>
    @endforelse
</div>
@endsection
