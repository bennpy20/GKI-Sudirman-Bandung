@extends('components.admin.layout')

@section('page_title', 'Kelola Jadwal Kebaktian')

@section('title', 'Admin - Jadwal Kebaktian')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.worship.index') }}" class="text-sm font-medium text-gray-500 hover:text-church-gold mb-3 inline-flex items-center transition-colors">
        <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-2 shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </div>
        Kembali
    </a>
    <h2 class="text-3xl font-bold text-church-dark mt-1">Tambah Data Jadwal Kebaktian</h2>
</div>
<!-- x-data utk penatalayan -->
<form action="{{ route('admin.worship.store') }}" method="POST"
    x-data="{
        selectedCategory: '0',
        stewards: @js($stewards),
        members: @js($members),
        selections: {},
        search: {},
        isOpen: {},
        get filteredStewards() {
            if (this.selectedCategory == 0) {
                return this.stewards.filter(s => s.commissions_id === null);
            }
            return this.stewards.filter(
                s => parseInt(s.commissions_id) === parseInt(this.selectedCategory)
            );
        },
        getOptions(stewardId) {
            let keyword = (this.search[stewardId] || '').toLowerCase();
            let results = this.members
                .filter(m => (m.stewards || []).some(s => s.id == stewardId))
                .filter(m => !(this.selections[stewardId] || []).some(sel => sel.id === m.id));
            if (keyword === '') {
                return results.slice(0, 3);
            }
            return results
                .filter(m => m.name.toLowerCase().includes(keyword))
                .slice(0, 3);
        },
        addMember(stewardId, member) {
            if (!this.selections[stewardId]) {
                this.selections[stewardId] = [];
            }
            this.selections[stewardId].push(member);
        },
        removeMember(stewardId, memberId) {
            this.selections[stewardId] =
                this.selections[stewardId].filter(m => m.id !== memberId);
        },
    }">
    @csrf
    <div class="space-y-8 pb-24">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50">
                <h3 class="text-lg font-bold text-church-dark flex items-center gap-2">
                    Data Jadwal Kebaktian
                </h3>
            </div>
            <div class="p-6 md:p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Judul Khotbah <span class="text-red-500">*</span></label>
                        <input type="text" name="title" required placeholder="Tuliskan judul khotbah.." class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                    </div>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pengkhotbah <span class="text-red-500">*</span></label>
                        <div x-data="{
                            search: '',
                            isOpen: false,
                            selectedId: '',
                            options: @js($preachers).map(p => ({
                                id: p.id,
                                name: p.name,
                                base: p.base,
                            })),
                            get filteredOptions() {
                                if (this.search === '') {
                                    return this.options.slice(0, 3);
                                }
                                return this.options
                                    .filter(opt => opt.name.toLowerCase().includes(this.search.toLowerCase()))
                                    .slice(0, 3);
                            },
                            selectOption(opt) {
                                this.selectedId = opt.id;
                                this.search = opt.name;
                                this.isOpen = false;
                            },
                            clearSelection() {
                                this.selectedId = '';
                                this.search = '';
                                this.isOpen = true;
                                $refs.searchInput.focus();
                            }
                        }" 
                        class="relative w-full" @click.away="isOpen = false">
                            <!-- Hidden -->
                            <input type="hidden" name="preachers_id" :value="selectedId">
                            <!-- Input -->
                            <div class="relative">
                                <input type="text"
                                    x-model="search"
                                    x-ref="searchInput"
                                    placeholder="Tuliskan nama pengkhotbah.."
                                    @focus="isOpen = true"
                                    @input="isOpen = true; selectedId = ''"
                                    class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                                <!-- Clear -->
                                <button type="button"
                                        x-show="search.length > 0"
                                        @click="clearSelection"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-300 hover:text-red-500 cursor-pointer">
                                    <i class="fas fa-times-circle"></i>
                                </button>
                            </div>
                            <!-- Dropdown -->
                            <div x-show="isOpen"
                                x-transition
                                class="absolute z-50 w-full mt-2 bg-white border border-gray-100 rounded-xl shadow-[0_10px_40px_rgba(0,0,0,0.1)] overflow-hidden">
                                <ul class="p-1.5">
                                    <!-- Options -->
                                    <template x-for="opt in filteredOptions" :key="opt.id">
                                        <li @click="selectOption(opt)"
                                            class="px-3 py-2 mb-0.5 hover:bg-church-gold/10 hover:text-yellow-800 cursor-pointer rounded-lg text-sm transition-colors flex items-center gap-2"
                                            :class="selectedId === opt.id ? 'bg-church-gold/10 text-yellow-800' : 'text-gray-700'">
                                            <div class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center text-xs text-gray-500 border">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="flex-1">
                                                <div x-text="opt.name" class="font-medium"></div>
                                                <div x-text="opt.base" class="text-xs text-gray-400"></div>
                                            </div>
                                            <i x-show="selectedId === opt.id"
                                            class="fas fa-check text-church-gold text-xs"></i>
                                        </li>
                                    </template>
                                    <!-- Empty -->
                                    <li x-show="filteredOptions.length === 0"
                                        class="px-3 py-4 text-center text-gray-400 text-sm">
                                        Data pengkhotbah tidak ditemukan. Silakan tambahkan data pengkhotbah terlebih dahulu.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @error('preachers_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Bacaan Alkitab <span class="text-red-500">*</span></label>
                        <input type="text" name="bible_verse" required placeholder="Tuliskan bacaan Alkitab.." class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                    </div>
                    @error('bible_verse')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Jenis Kebaktian <span class="text-red-500">*</span></label>
                        <select name="category" x-model="selectedCategory" required class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark appearance-none font-medium">
                            <option value="0" selected>Kebaktian Umum</option>
                            @foreach($commissions as $commission)
                                <option value="{{ $commission->id }}">Ibadah {{ $commission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal <span class="text-red-500">*</span></label>
                            <input type="date" name="date" required class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                        </div>
                        @error('date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Waktu <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="time" name="time" required class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                            </div>
                        </div>
                        @error('time')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tautan Video/Livestreaming</label>
                        <input type="text" name="video_url" placeholder="Masukkan tautan.." class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                    </div>
                    @error('video_url')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pekan Liturgi</label>
                        @if ($liturgical_calendars->isEmpty())
                            <p class="text-sm text-gray-500 italic">Belum ada data pekan liturgi. Silakan tambahkan data pekan liturgi terlebih dahulu.</p>
                        @else
                            <select name="liturgical_calendars_id" class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark appearance-none font-medium">
                                <option value="" selected>Pilih Pekan Liturgi</option>
                                @foreach ($liturgical_calendars as $liturgical_calendar)
                                    <option value="{{ $liturgical_calendar->id }}">{{ $liturgical_calendar->name }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    @error('liturgical_calendars_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            <span>Deskripsi</span>
                        </label>
                        <textarea name="description" rows="5" placeholder="Tuliskan deskripsi tambahan.." class="w-full px-5 py-4 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-church-gold focus:border-church-gold focus:bg-white outline-none transition-all text-church-dark font-medium leading-relaxed resize-y"></textarea>
                    </div>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50">
                    <h3 class="text-lg font-bold text-church-dark flex items-center gap-2">
                        Data Penatalayan
                    </h3>
                </div>
                <div class="p-6 mb-24">
                    <div x-show="filteredStewards.length === 0"
                        class="text-center text-gray-400 text-sm py-6">
                        Belum ada data pelayanan untuk jenis kebaktian ini. Silakan tambahkan data jenis pelayanan terlebih dahulu.
                    </div>
                    <template x-for="steward in filteredStewards" :key="steward.id">
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-gray-700 mb-2"
                                x-text="steward.field"></label>
                            <!-- Search -->
                            <div class="relative">
                                <input type="text"
                                    x-model="search[steward.id]"
                                    @focus="isOpen[steward.id] = true"
                                    @input="isOpen[steward.id] = true"
                                    @click.stop
                                    placeholder="Cari nama penatalayan.."
                                    class="w-full px-5 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-church-gold focus:border-church-gold outline-none transition-all text-church-dark font-medium">
                                <!-- Dropdown -->
                                <div x-show="isOpen[steward.id]"
                                    @click.away="isOpen[steward.id] = false"
                                    x-transition
                                    class="absolute z-50 w-full mt-2 bg-white border border-gray-100 rounded-xl shadow-[0_10px_40px_rgba(0,0,0,0.1)] overflow-hidden">
                                    <ul class="p-1.5">
                                        <template x-for="opt in getOptions(steward.id)" :key="opt.id">
                                            <li @click="
                                                    addMember(steward.id, opt);
                                                    search[steward.id] = '';
                                                    isOpen[steward.id] = false"
                                                class="px-3 py-2 mb-0.5 hover:bg-church-gold/10 hover:text-yellow-800 cursor-pointer rounded-lg text-sm transition-colors flex items-center gap-2">
                                                <div class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center text-xs text-gray-500 border">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <span class="flex-1" x-text="opt.name"></span>
                                            </li>
                                        </template>
                                        <li x-show="getOptions(steward.id).length === 0"
                                            class="px-3 py-4 text-center text-gray-400 text-sm">
                                            Data jemaat tidak ditemukan atau sudah dipilih. Silakan cari dengan nama lain.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Nama penatalayan yg dipilih -->
                            <div class="flex flex-wrap gap-2 mt-3">
                                <template x-for="member in selections[steward.id] || []">
                                    <span class="px-3 py-2 bg-church-gold/10 text-yellow-800 rounded-lg text-sm flex items-center gap-1">
                                        <span x-text="member.name"></span>
                                        <button type="button"
                                                class="cursor-pointer"
                                                @click="removeMember(steward.id, member.id)">
                                            <i class="fas fa-times-circle pl-1"></i>
                                        </button>
                                    </span>
                                </template>
                            </div>
                        </div>
                    </template>
                    <!-- Input hidden utk save datanya -->
                    <template x-for="(members, stewardId) in selections">
                        <template x-for="member in members">
                            <input type="hidden"
                                name="stewards[]"
                                :value="JSON.stringify({
                                    steward_id: stewardId,
                                    member_id: member.id
                                })">
                        </template>
                    </template>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed bottom-0 left-0 md:left-64 right-0 p-4 lg:p-6 bg-white/90 backdrop-blur-md border-t border-gray-200/60 z-30 flex justify-end gap-3 shadow-[0_-10px_40px_rgba(0,0,0,0.05)] transition-all">
        <a href="{{ route('admin.worship.index') }}" class="px-5 lg:px-6 py-2.5 lg:py-3 bg-white border border-gray-300 rounded-xl text-gray-700 font-bold hover:bg-gray-50 transition-colors text-sm lg:text-base">
            Batalkan
        </a>
        <button type="submit" class="cursor-pointer px-6 lg:px-8 py-2.5 lg:py-3 bg-gradient-to-r from-church-gold to-yellow-600 rounded-xl text-church-dark font-bold hover:from-yellow-500 hover:to-yellow-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm lg:text-base flex items-center gap-2">
            <i class="fas fa-save"></i>Simpan Jadwal Kebaktian
        </button>
    </div>
</form>
@endsection
