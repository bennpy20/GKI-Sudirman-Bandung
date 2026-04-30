@extends('components.admin.layout')

@section('page_title', 'Kelola Pelayanan')

@section('title', 'Admin - Pelayanan')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.steward.index') }}" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
        <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </div>
        Kembali
    </a>
    <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Sunting Data Pelayanan</h2>
</div>
<form action="{{ route('admin.steward.update', $steward->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 pb-24">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50">
                <h3 class="text-lg font-bold text-church-dark flex items-center gap-2">
                    Data Pelayanan
                </h3>
            </div>
            <div class="p-6 md:p-8 space-y-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Pelayanan <span class="text-red-500">*</span></label>
                    <input type="text" name="field" value="{{ old('field', $steward->field) }}" required class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all focus:bg-white text-church-dark font-medium">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Bidang Komisi</label>
                    @if ($commissions->isEmpty())
                        <p class="text-sm text-gray-500 italic">Belum ada data komisi. Silakan tambahkan data komisi terlebih dahulu.</p>
                    @else
                    <select name="commissions_id" class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark appearance-none font-medium">
                        <option value="" selected>Bidang Umum</option>
                        @foreach ($commissions as $commission)
                            <option value="{{ $commission->id }}" {{ old('commissions_id', $steward->commissions_id) == $commission->id ? 'selected' : '' }}>Komisi {{ $commission->name }}</option>
                        @endforeach
                    </select>
                    @endif
                    @error('commissions_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="fixed bottom-0 left-0 md:left-64 right-0 p-4 lg:p-6 bg-white/90 backdrop-blur-md border-t border-gray-200/60 z-30 flex justify-end gap-3 shadow-[0_-10px_40px_rgba(0,0,0,0.05)] transition-all">
        <a href="{{ route('admin.steward.index') }}" class="px-5 lg:px-6 py-2.5 lg:py-3 bg-white border border-gray-300 rounded-xl text-gray-700 font-bold hover:bg-gray-50 transition-colors text-sm lg:text-base">
            Batalkan
        </a>
        <button type="submit" class="cursor-pointer px-6 lg:px-8 py-2.5 lg:py-3 bg-gradient-to-r from-church-gold to-yellow-600 rounded-xl text-church-dark font-bold hover:from-yellow-500 hover:to-yellow-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm lg:text-base flex items-center gap-2">
            <i class="fas fa-save"></i>Perbarui Pelayanan
        </button>
    </div>
</form>
@endsection
