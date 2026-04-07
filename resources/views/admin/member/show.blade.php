@extends('components.admin.layout')

@section('page_title', 'Kelola Keanggotaan Jemaat')

@section('title', 'Admin - Keanggotaan Jemaat')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="{{ route('admin.member.index') }}" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
            <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
                <i class="fas fa-arrow-left"></i>
            </div>
            Kembali
        </a>
        <h2 class="text-3xl font-serif font-bold text-church-dark mt-1">Detail Anggota Jemaat</h2>
    </div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-1 space-y-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden text-center relative">
            <div class="h-24 bg-gradient-to-r from-church-gold to-yellow-600"></div>
            <div class="relative px-6 pb-6 -mt-12">
                <div class="w-24 h-24 rounded-full bg-white p-1 mx-auto shadow-md mb-4 flex items-center justify-center border border-gray-100 relative">
                    <div class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center text-3xl font-bold text-gray-400">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="absolute bottom-1 right-1 w-5 h-5 border-2 border-white rounded-full {{ $member->is_active === 1 ? 'bg-green-500' : 'bg-red-500' }}" title="{{ $member->is_active === 1 ? 'Aktif' : 'Non-Aktif' }}"></div>
                </div>
                <h3 class="text-xl font-bold text-church-dark">{{ $member->name }}</h3>
                <p class="text-sm font-medium text-gray-500 mt-1">ID: {{ $member->member_new_id }}</p>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50 flex flex-col gap-4">
                <h3 class="font-bold text-base text-church-dark flex items-center gap-2">
                    Informasi Lainnya
                </h3>
                <div class="flex items-start gap-3">
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Nomor Telepon</p>
                        <p class="text-sm font-bold text-church-dark mt-0.5">{{ $member->phone_number ?? '-' }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Status Keanggotaan</p>
                        <p class="text-sm font-bold text-church-dark mt-0.5">{{ $member->memberStatus }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lg:col-span-2 space-y-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-church-warm/20">
                <h3 class="text-base font-bold text-church-dark flex items-center gap-2">
                    Data Pribadi Jemaat
                </h3>
            </div>
            <div class="p-6">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                    <div>
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Tanggal Lahir</dt>
                        <dd class="text-base font-medium text-church-dark">{{ $member->birth_date_formatted }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Jenis Kelamin</dt>
                        <dd class="text-base font-medium text-church-dark">{{ $member->memberGender }}</dd>
                    </div>
                    <div class="md:col-span-2">
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Alamat</dt>
                        <dd class="text-base font-medium text-church-dark leading-relaxed">{{ $member->address }}</dd>
                    </div>
                </dl>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-church-warm/20">
                <h3 class="text-base font-bold text-church-dark flex items-center gap-2">
                    Keanggotaan Jemaat
                </h3>
            </div>
            <div class="p-6">
                <dl class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-6">
                    <div>
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Tanggal Bergabung</dt>
                        <dd class="text-base font-medium text-church-dark">{{ $member->join_date_formatted }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Rayon</dt>
                        <dd class="text-base font-medium text-church-dark flex items-center gap-2">
                            {{ $member->regions?->name ? 'Rayon ' . $member->regions->name : '-' }}
                            @if($member->is_region_leader === 1)
                            <span class="text-[10px] bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded-full font-bold">KETUA</span>
                            @endif
                        </dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Komisi</dt>
                        <dd class="text-base font-medium text-church-dark">{{ $member->commissions->name ?? '-' }}</dd>
                    </div>
                </dl>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-50 bg-church-warm/20">
        <h3 class="text-base font-bold text-church-dark">
            Bidang Pelayanan
        </h3>
    </div>

    <div class="p-6 space-y-6">

        {{-- ❌ Kalau tidak ada pelayanan --}}
        @if($stewardsGrouped->isEmpty())
            <p class="text-sm text-gray-500 italic">
                Jemaat belum terlibat dalam pelayanan.
            </p>
        @else

            {{-- 🔥 LOOP PER KOMISI --}}
            @foreach($stewardsGrouped as $category => $stewards)

                <div class="bg-gray-50/50 p-5 rounded-2xl border border-gray-100">

                    {{-- LABEL KOMISI --}}
                    <h4 class="text-sm font-bold text-gray-800 mb-3 flex items-center gap-2">
                        <div class="w-1.5 h-4 bg-church-gold rounded-full"></div>
                        {{ $category }}
                    </h4>

                    {{-- LIST STEWARDS --}}
                    <div class="flex flex-wrap gap-2">
                        @foreach($stewards as $steward)
                            <span class="px-3 py-1.5 bg-white border border-gray-200 rounded-lg text-sm font-medium text-gray-700 shadow-sm">
                                {{ $steward->field }}
                            </span>
                        @endforeach
                    </div>

                </div>

            @endforeach

        @endif

    </div>
</div>
    </div>
</div>
@endsection
