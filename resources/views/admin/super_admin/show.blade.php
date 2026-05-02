@extends('components.admin.layout')

@section('page_title', 'Kelola Akun Admin Sistem')

@section('title', 'Admin - Admin Sistem')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="{{ route('admin.super_admin.index') }}" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
            <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
                <i class="fas fa-arrow-left"></i>
            </div>
            Kembali
        </a>
        <h2 class="text-3xl font-bold text-church-dark mt-1">Detail Akun Admin</h2>
    </div>
</div>

<div class="gap-8 pb-24">
    <div class="md:col-span-2 space-y-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50">
                <h3 class="text-base font-bold text-church-dark flex items-center gap-2">
                    Informasi Akun
                </h3>
            </div>
            <div class="p-6 divide-y divide-gray-100">
                <div class="py-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="text-sm font-medium text-gray-500">Nama Lengkap</div>
                    <div class="md:col-span-2 text-sm font-bold text-church-dark">{{ $user->name }}</div>
                </div>
                <div class="py-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="text-sm font-medium text-gray-500">Alamat Email</div>
                    <div class="md:col-span-2 text-sm font-bold text-church-dark">{{ $user->email }}</div>
                </div>
                <div class="py-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="text-sm font-medium text-gray-500">Tanggal Terdaftar</div>
                    <div class="md:col-span-2 text-sm font-bold text-church-dark">{{ $user->created_at_formatted }}</div>
                </div>
                <div class="py-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="text-sm font-medium text-gray-500">Terakhir Diperbarui</div>
                    <div class="md:col-span-2 text-sm font-bold text-church-dark">{{ $user->updated_at_formatted }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
