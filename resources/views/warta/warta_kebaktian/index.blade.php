@extends('components.layout')

@section('title')
    GKI Sudirman
@endsection

@section('content')
<div x-show="!selectedDevotional && !selectedArticle">
    <div x-show="currentRoute === 'warta_kebaktian.index'">
        <div class="mb-10">
            <h2 class="text-3xl font-serif mb-2">Warta Kebaktian</h2>
            <p class="text-church-dark/50 italic">Daftar penatalayan ibadah minggu ini</p>
            <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
        </div>
        <div class="bg-white rounded-3xl card-shadow border border-black/5 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-church-warm/30">
                            <th class="p-6 font-serif text-xl border-b border-black/5">Tugas / Waktu</th>
                            <th class="p-6 font-serif text-xl border-b border-black/5 text-center">07.00 WIB</th>
                            <th class="p-6 font-serif text-xl border-b border-black/5 text-center">09.00 WIB</th>
                            <th class="p-6 font-serif text-xl border-b border-black/5 text-center">17.00 WIB</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-black/5">
                        <template x-for="role in roles" :key="role">
                            <tr class="hover:bg-church-warm/10 transition-colors">
                                <td class="p-6 font-bold text-church-dark/70" x-text="role"></td>
                                <template x-for="time in ['07.00 WIB', '09.00 WIB', '17.00 WIB']">
                                    <td class="p-6 text-center text-church-dark/60 italic" x-text="getPenatalayan(role, time)"></td>
                                </template>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection