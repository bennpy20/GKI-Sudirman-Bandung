<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GKI Sudirman Digital Portal</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js for Interactivity -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        church: {
                            gold: '#C5A059',
                            dark: '#1A1A1A',
                            warm: '#F5F2ED',
                        }
                    },
                    fontFamily: {
                        serif: ['Cormorant Garamond', 'serif'],
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        .card-shadow { box-shadow: 0 10px 30px -10px rgba(0,0,0,0.05); }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .whitespace-pre-wrap { white-space: pre-wrap; }
    </style>
</head>
<body class="bg-church-warm/30 font-sans text-church-dark" 
    x-data="{
        activeTab: 'home',
        isAdminMode: false,
        adminTab: 'dashboard',
        adminViewMode: 'list', // 'list', 'create', 'edit', 'view'
        selectedAdminItem: null,
        adminFormData: {},
        mobileMenuOpen: false,
        activeDropdown: null,
        selectedDevotional: null,
        selectedArticle: null,
        activeMonth: 0,
        bibleChecked: JSON.parse(localStorage.getItem('bibleChecked') || '[]'),
        
        navItems: [
            { id: 'home', label: 'Home' },
            { 
                id: 'warta', label: 'Warta', 
                subItems: [
                    { id: 'warta-kebaktian', label: 'Warta Kebaktian' },
                    { id: 'warta-jemaat', label: 'Warta Jemaat' },
                    { id: 'warta-kegiatan', label: 'Warta Kegiatan' },
                ]
            },
            { id: 'renungan', label: 'Renungan Harian' },
            { 
                id: 'artikel', label: 'Artikel',
                subItems: [
                    { id: 'artikel-teologis', label: 'Artikel Teologis' },
                    { id: 'artikel-humanis', label: 'Artikel Humanis' },
                    { id: 'artikel-khotbah', label: 'Khotbah Minggu' },
                    { id: 'artikel-liturgi', label: 'Liturgi' },
                ]
            },
            { 
                id: 'tentang', label: 'Tentang Kami',
                subItems: [
                    { id: 'tentang-visi', label: 'Visi Misi' },
                    { id: 'tentang-keanggotaan', label: 'Keanggotaan' },
                    { id: 'tentang-baptis', label: 'Baptis & Nikah' },
                    { id: 'tentang-struktur', label: 'Struktur Kemajelisan' },
                    { id: 'tentang-alkitab', label: 'Baca Alkitab 1 Tahun' },
                ]
            },
            { id: 'kontak', label: 'Hubungi Kami' },
        ],

        adminNav: [
            { id: 'dashboard', label: 'Dashboard', icon: 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6' },
            { id: 'devotionals', label: 'Renungan Harian', icon: 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253' },
            { id: 'warta', label: 'Warta & Kegiatan', icon: 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z' },
            { id: 'articles', label: 'Artikel & Khotbah', icon: 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z' },
            { id: 'members', label: 'Data Jemaat', icon: 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z' },
            { id: 'finance', label: 'Laporan Keuangan', icon: 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z' },
        ],

        months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        
        roles: ['Pengkhotbah', 'Liturgos', 'Pemusik', 'Pemandu Pujian', 'Majelis Pendamping'],
        
        penatalayan: [
            { role: 'Pengkhotbah', time: '07.00 WIB', name: 'Pdt. Yohanes' },
            { role: 'Pengkhotbah', time: '09.00 WIB', name: 'Pdt. Yohanes' },
            { role: 'Pengkhotbah', time: '17.00 WIB', name: 'Pdt. Maria' },
            { role: 'Liturgos', time: '07.00 WIB', name: 'Bpk. Agus' },
            { role: 'Liturgos', time: '09.00 WIB', name: 'Ibu Sari' },
            { role: 'Liturgos', time: '17.00 WIB', name: 'Sdr. Kevin' },
        ],

        devotionals: [
            { id: 1, title: 'Membangun Iman di Tengah Badai', content: 'Renungan hari ini mengajak kita untuk tetap percaya meskipun keadaan di sekitar kita tampak tidak menentu. Seperti murid-murid Yesus di tengah danau yang dilanda badai, kita seringkali merasa takut. Namun, Yesus ada di perahu yang sama dengan kita. Percayalah bahwa Dia sanggup meneduhkan badai dalam hidupmu. Mari kita luangkan waktu sejenak untuk berdoa dan menyerahkan segala kekuatiran kita kepada-Nya.', author: 'Pdt. Rinto', date: '2026-02-27' },
            { id: 2, title: 'Kasih yang Memulihkan', content: 'Kasih Kristus bukan hanya sekadar kata-kata, melainkan tindakan nyata yang memulihkan. Dalam perjumpaan-Nya dengan orang-orang yang terpinggirkan, Yesus menunjukkan bahwa tidak ada dosa yang terlalu besar untuk diampuni dan tidak ada luka yang terlalu dalam untuk disembuhkan. Hari ini, biarlah kasih itu mengalir melalui hidup kita kepada sesama.', author: 'Pdt. Yohanes', date: '2026-02-26' },
        ],

        warta: [
            { id: 1, type: 'jemaat', title: 'Baptis Kudus Anak', description: 'Akan dilaksanakan pada hari Minggu, 5 April 2026. Bagi orang tua yang rindu membaptiskan anaknya, silakan menghubungi sekretariat gereja.', image_url: 'https://picsum.photos/seed/baptism/800/600', date: '2026-03-01' },
            { id: 2, type: 'kegiatan', title: 'Retreat Pemuda 2026', description: 'Mari bergabung dalam retreat pemuda bertema \'Rooted in Christ\' yang akan diadakan di Puncak pada 15-17 Mei 2026.', image_url: 'https://picsum.photos/seed/retreat/800/600', date: '2026-03-15' },
        ],

        articles: [
            { id: 1, category: 'teologis', title: 'Memahami Kasih Karunia', content: 'Kasih karunia adalah konsep sentral dalam iman Kristen. Seringkali kita terjebak dalam pemikiran bahwa kita harus \'layak\' untuk menerima kasih Tuhan. Namun, esensi dari kasih karunia adalah pemberian yang tidak layak kita terima, namun diberikan secara cuma-cuma oleh Allah melalui Kristus...', author: 'Pdt. Yohanes', date: '2026-02-20' },
        ],

        members: [
            { id: 1, name: 'Budi Santoso', address: 'Jl. Merdeka No. 10, Jakarta Pusat', phone: '08123456789', status: 'Aktif', email: 'budi.s@gmail.com' },
            { id: 2, name: 'Siti Aminah', address: 'Jl. Mawar No. 5, Jakarta Selatan', phone: '08198765432', status: 'Aktif', email: 'siti.a@yahoo.com' },
            { id: 3, name: 'Hendra Wijaya', address: 'Apartemen Sudirman Park Lt. 12', phone: '08567890123', status: 'Non-Aktif', email: 'hendra.w@outlook.com' },
        ],

        finances: [
            { id: 1, date: '2026-03-10', type: 'Pemasukan', category: 'Persembahan Minggu', amount: 5000000, description: 'Ibadah Raya 1 & 2' },
            { id: 2, date: '2026-03-12', type: 'Pengeluaran', category: 'Listrik', amount: 1200000, description: 'Tagihan PLN Maret' },
            { id: 3, date: '2026-03-13', type: 'Pemasukan', category: 'Persembahan Syukur', amount: 2500000, description: 'Keluarga Bpk. Abraham' },
        ],

        birthdays: [
            { name: 'Budi Santoso', date: '15 Maret' },
            { name: 'Siti Aminah', date: '27 Februari' },
            { name: 'Hendra Wijaya', date: '28 Februari' },
        ],

        structure: [
            { name: 'Pdt. Yohanes', role: 'Pendeta Jemaat' },
            { name: 'Pdt. Maria', role: 'Pendeta Jemaat' },
            { name: 'Bpk. Agus', role: 'Ketua Umum Majelis' },
            { name: 'Ibu Sari', role: 'Sekretaris Umum' }
        ],

        formatDate(dateStr) {
            const options = { day: 'numeric', month: 'long', year: 'numeric' };
            return new Date(dateStr).toLocaleDateString('id-ID', options);
        },

        getPenatalayan(role, time) {
            const p = this.penatalayan.find(item => item.role === role && item.time === time);
            return p ? p.name : '-';
        },

        getDaysInMonth() {
            return Array.from({ length: 30 }, (_, i) => this.activeMonth * 30 + i + 1);
        },

        getPassage(day) {
            const books = ['Kejadian', 'Keluaran', 'Imamat', 'Bilangan', 'Ulangan'];
            const book = books[Math.floor((day - 1) / 30) % books.length];
            const start = ((day - 1) % 30) * 3 + 1;
            return `${book} ${start}-${start + 2}`;
        },

        toggleBibleDay(day) {
            if (this.bibleChecked.includes(day)) {
                this.bibleChecked = this.bibleChecked.filter(d => d !== day);
            } else {
                this.bibleChecked.push(day);
            }
            localStorage.setItem('bibleChecked', JSON.stringify(this.bibleChecked));
        },

        isDayChecked(day) {
            return this.bibleChecked.includes(day);
        },

        getMonthlyProgress() {
            return this.bibleChecked.filter(d => d > this.activeMonth * 30 && d <= (this.activeMonth + 1) * 30).length;
        },

        // Admin Helper Functions
        handleAdminTabChange(tab) {
            this.adminTab = tab;
            this.adminViewMode = 'list';
            this.selectedAdminItem = null;
        },

        handleCreate() {
            this.adminViewMode = 'create';
            this.adminFormData = this.getInitialData();
        },

        handleEdit(item) {
            this.adminViewMode = 'edit';
            this.selectedAdminItem = item;
            this.adminFormData = { ...item };
        },

        handleView(item) {
            this.adminViewMode = 'view';
            this.selectedAdminItem = item;
        },

        handleDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                this[this.adminTab] = this[this.adminTab].filter(item => item.id !== id);
            }
        },

        handleSave() {
            if (this.adminViewMode === 'create') {
                const newItem = { ...this.adminFormData, id: Date.now() };
                this[this.adminTab].unshift(newItem); // Add to beginning
            } else if (this.adminViewMode === 'edit') {
                const index = this[this.adminTab].findIndex(item => item.id === this.selectedAdminItem.id);
                if (index !== -1) {
                    this[this.adminTab][index] = { ...this.adminFormData };
                }
            }
            this.adminViewMode = 'list';
            this.selectedAdminItem = null;
            this.adminFormData = {};
        },

        getInitialData() {
            const today = new Date().toISOString().split('T')[0];
            switch(this.adminTab) {
                case 'devotionals': return { title: '', content: '', author: '', date: today };
                case 'warta': return { title: '', description: '', type: 'jemaat', date: today, image_url: '' };
                case 'articles': return { title: '', content: '', author: '', category: 'teologis', date: today };
                case 'members': return { name: '', address: '', phone: '', status: 'Aktif', email: '' };
                case 'finance': return { date: today, type: 'Pemasukan', category: '', amount: 0, description: '' };
                default: return {};
            }
        },

        getTotalFinance(type) {
            return this.finances
                .filter(f => f.type === type)
                .reduce((sum, f) => sum + Number(f.amount), 0);
        },

        formatCurrency(amount) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(amount);
        }
    }" 
    x-cloak>

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 bg-white/90 backdrop-blur-md z-50 border-b border-black/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Logo -->
                <div class="flex items-center gap-3 cursor-pointer" @click="activeTab = 'home'; selectedDevotional = null; selectedArticle = null">
                    <div class="w-10 h-10 bg-church-gold rounded-full flex items-center justify-center text-white font-serif text-xl font-bold shadow-lg shadow-church-gold/20">S</div>
                    <div class="flex flex-col">
                        <span class="text-lg font-serif font-bold leading-tight">GKI Sudirman</span>
                        <span class="text-[10px] uppercase tracking-widest opacity-60">Bertumbuh Dalam Kasih</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center gap-6">
                    <template x-for="item in navItems" :key="item.id">
                        <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                            <button 
                                @click="!item.subItems ? (activeTab = item.id, selectedDevotional = null, selectedArticle = null, isAdminMode = false) : null"
                                class="flex items-center gap-1 text-sm font-medium transition-colors py-2"
                                :class="activeTab.startsWith(item.id) && !isAdminMode ? 'text-church-gold' : 'text-church-dark/60 hover:text-church-dark'"
                            >
                                <span x-text="item.label"></span>
                                <svg x-show="item.subItems" class="w-3 h-3 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            
                            <div x-show="item.subItems && open" 
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                class="absolute top-full left-0 mt-1 w-56 bg-white rounded-2xl shadow-xl border border-black/5 p-2">
                                <template x-for="sub in item.subItems" :key="sub.id">
                                    <button 
                                        @click="activeTab = sub.id; selectedDevotional = null; selectedArticle = null; isAdminMode = false; open = false"
                                        class="w-full text-left px-4 py-2.5 rounded-xl text-sm transition-colors hover:bg-church-warm/50"
                                        :class="activeTab === sub.id && !isAdminMode ? 'bg-church-gold/10 text-church-gold' : 'text-church-dark/70'"
                                        x-text="sub.label">
                                    </button>
                                </template>
                            </div>
                        </div>
                    </template>
                    
                    <!-- Admin Toggle Button -->
                    <button 
                        @click="isAdminMode = !isAdminMode; mobileMenuOpen = false"
                        class="ml-4 p-2 rounded-full transition-all"
                        :class="isAdminMode ? 'bg-church-gold text-white shadow-lg' : 'bg-church-warm/50 text-church-dark/40 hover:text-church-gold'">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </button>
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="lg:hidden p-2" @click="mobileMenuOpen = !mobileMenuOpen">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" class="lg:hidden bg-white border-b border-black/5" x-transition>
            <div class="px-4 py-6 flex flex-col gap-2">
                <template x-for="item in navItems" :key="item.id">
                    <div>
                        <button 
                            @click="!item.subItems ? (activeTab = item.id, selectedDevotional = null, selectedArticle = null, isAdminMode = false, mobileMenuOpen = false) : (activeDropdown = activeDropdown === item.id ? null : item.id)"
                            class="w-full flex items-center justify-between p-3 rounded-xl text-base font-medium transition-all"
                            :class="activeTab.startsWith(item.id) && !isAdminMode ? 'bg-church-gold/10 text-church-gold' : 'text-church-dark/60'"
                        >
                            <span x-text="item.label"></span>
                            <svg x-show="item.subItems" class="w-4 h-4 transition-transform" :class="activeDropdown === item.id ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="item.subItems && activeDropdown === item.id" class="ml-6 mt-1 flex flex-col gap-1 border-l-2 border-church-gold/20 pl-4">
                            <template x-for="sub in item.subItems" :key="sub.id">
                                <button 
                                    @click="activeTab = sub.id; selectedDevotional = null; selectedArticle = null; isAdminMode = false; mobileMenuOpen = false"
                                    class="w-full text-left py-2 text-sm transition-colors"
                                    :class="activeTab === sub.id && !isAdminMode ? 'text-church-gold font-bold' : 'text-church-dark/50'"
                                    x-text="sub.label">
                                </button>
                            </template>
                        </div>
                    </div>
                </template>
                
                <!-- Mobile Admin Toggle -->
                <button 
                    @click="isAdminMode = !isAdminMode; mobileMenuOpen = false"
                    class="w-full flex items-center gap-3 p-3 rounded-xl text-base font-medium text-church-dark/60 hover:bg-church-warm/50"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span>Panel Admin</span>
                </button>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-24 pb-20 px-4 max-w-7xl mx-auto">
        
        <!-- Admin Dashboard View -->
        <div x-show="isAdminMode" class="flex flex-col lg:flex-row gap-8 min-h-[70vh]">
            <!-- Admin Sidebar -->
            <aside class="lg:w-64 shrink-0">
                <div class="bg-white rounded-[40px] card-shadow border border-black/5 p-6 sticky top-24">
                    <div class="mb-8 px-4">
                        <h2 class="text-2xl font-serif">Admin</h2>
                        <p class="text-[10px] uppercase tracking-widest opacity-40 font-bold">Control Panel</p>
                    </div>
                    <nav class="space-y-1">
                        <template x-for="item in adminNav" :key="item.id">
                            <button 
                                @click="handleAdminTabChange(item.id)"
                                class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium transition-all"
                                :class="adminTab === item.id ? 'bg-church-gold text-white shadow-lg shadow-church-gold/20' : 'text-church-dark/50 hover:bg-church-warm/50 hover:text-church-dark'">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="item.icon"></path></svg>
                                <span x-text="item.label"></span>
                            </button>
                        </template>
                    </nav>
                    <div class="mt-12 pt-6 border-t border-black/5 px-4">
                        <button @click="isAdminMode = false; activeTab = 'home'" class="flex items-center gap-2 text-xs text-rose-500 font-bold hover:opacity-70 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Keluar Admin
                        </button>
                    </div>
                </div>
            </aside>

            <!-- Admin Main Area -->
            <div class="flex-1">
                <div class="mb-8 flex justify-between items-end">
                    <div>
                        <h1 class="text-3xl font-serif capitalize" x-text="adminTab === 'finance' ? 'Keuangan' : adminTab"></h1>
                        <p class="text-church-dark/40 text-sm">Kelola konten dan data sistem GKI Sudirman</p>
                    </div>
                    <template x-if="adminTab !== 'dashboard' && adminViewMode === 'list'">
                        <button @click="handleCreate()" class="bg-church-gold text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-church-gold/20 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Tambah Baru
                        </button>
                    </template>
                </div>

                <!-- Overview Tab -->
                <div x-show="adminTab === 'dashboard'" class="space-y-8">
                    <div class="bg-white p-8 rounded-[40px] card-shadow border border-black/5 flex flex-col md:flex-row justify-between items-center gap-6">
                        <div>
                            <h2 class="text-3xl font-serif">Syalom, Admin</h2>
                            <p class="text-church-dark/50">Selamat datang kembali di sistem pengelolaan GKI Sudirman.</p>
                        </div>
                        <div class="flex gap-3">
                            <button @click="handleAdminTabChange('members')" class="px-6 py-3 rounded-2xl bg-church-warm/50 text-church-dark font-bold text-sm hover:bg-church-gold hover:text-white transition-all">Data Jemaat</button>
                            <button @click="handleAdminTabChange('finance')" class="px-6 py-3 rounded-2xl bg-church-warm/50 text-church-dark font-bold text-sm hover:bg-church-gold hover:text-white transition-all">Laporan Keuangan</button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-white p-6 rounded-3xl card-shadow border border-black/5 flex items-center gap-4">
                            <div class="w-12 h-12 bg-blue-500 rounded-2xl flex items-center justify-center text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs opacity-50 uppercase tracking-widest font-bold">Jemaat</p>
                                <p class="text-2xl font-serif" x-text="members.length"></p>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-3xl card-shadow border border-black/5 flex items-center gap-4">
                            <div class="w-12 h-12 bg-church-gold rounded-2xl flex items-center justify-center text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs opacity-50 uppercase tracking-widest font-bold">Renungan</p>
                                <p class="text-2xl font-serif" x-text="devotionals.length"></p>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-3xl card-shadow border border-black/5 flex items-center gap-4">
                            <div class="w-12 h-12 bg-emerald-500 rounded-2xl flex items-center justify-center text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs opacity-50 uppercase tracking-widest font-bold">Warta</p>
                                <p class="text-2xl font-serif" x-text="warta.length"></p>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-3xl card-shadow border border-black/5 flex items-center gap-4">
                            <div class="w-12 h-12 bg-purple-500 rounded-2xl flex items-center justify-center text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs opacity-50 uppercase tracking-widest font-bold">Artikel</p>
                                <p class="text-2xl font-serif" x-text="articles.length"></p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="bg-white p-8 rounded-[40px] card-shadow border border-black/5">
                            <h3 class="text-xl font-serif mb-6">Aktivitas Terakhir</h3>
                            <div class="space-y-4">
                                <template x-for="item in [...devotionals, ...articles, ...warta].sort((a,b) => new Date(b.date) - new Date(a.date)).slice(0, 5)" :key="item.id + item.title">
                                    <div class="flex items-center justify-between py-3 border-b border-black/5 last:border-0">
                                        <div class="flex items-center gap-3">
                                            <div class="w-2 h-2 rounded-full bg-church-gold"></div>
                                            <span class="text-sm font-medium" x-text="item.title"></span>
                                        </div>
                                        <span class="text-xs opacity-40" x-text="formatDate(item.date)"></span>
                                    </div>
                                </template>
                            </div>
                        </div>
                        <div class="bg-church-dark text-white p-8 rounded-[40px] shadow-xl">
                            <h3 class="text-xl font-serif mb-6 text-church-gold">Ringkasan Keuangan</h3>
                            <div class="space-y-6">
                                <div class="flex justify-between items-end">
                                    <div>
                                        <p class="text-xs opacity-50 uppercase tracking-widest mb-1">Total Saldo</p>
                                        <p class="text-3xl font-serif" x-text="formatCurrency(getTotalFinance('Pemasukan') - getTotalFinance('Pengeluaran'))"></p>
                                    </div>
                                    <svg class="w-12 h-12 text-church-gold opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div class="grid grid-cols-2 gap-4 pt-6 border-t border-white/10">
                                    <div>
                                        <p class="text-[10px] opacity-40 uppercase tracking-widest">Total Pemasukan</p>
                                        <p class="text-emerald-400 font-bold" x-text="'+ ' + formatCurrency(getTotalFinance('Pemasukan'))"></p>
                                    </div>
                                    <div>
                                        <p class="text-[10px] opacity-40 uppercase tracking-widest">Total Pengeluaran</p>
                                        <p class="text-rose-400 font-bold" x-text="'- ' + formatCurrency(getTotalFinance('Pengeluaran'))"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- List View -->
                <div x-show="adminTab !== 'dashboard' && adminViewMode === 'list'" class="bg-white rounded-[40px] card-shadow border border-black/5 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-church-warm/10 text-[10px] uppercase tracking-widest opacity-40">
                                <tr>
                                    <th class="p-6">Informasi Utama</th>
                                    <template x-if="adminTab !== 'members'">
                                        <th class="p-6">Tanggal</th>
                                    </template>
                                    <template x-if="adminTab === 'members'">
                                        <th class="p-6">Status</th>
                                    </template>
                                    <template x-if="adminTab === 'finance'">
                                        <th class="p-6">Nominal</th>
                                    </template>
                                    <th class="p-6 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-black/5">
                                <template x-for="item in this[adminTab]" :key="item.id">
                                    <tr class="text-sm hover:bg-church-warm/5 transition-colors">
                                        <td class="p-6">
                                            <div class="font-bold text-base" x-text="item.title || item.name || item.category"></div>
                                            <div class="text-xs opacity-40" x-text="item.author || (adminTab === 'members' ? item.email : item.description)"></div>
                                        </td>
                                        <template x-if="adminTab !== 'members'">
                                            <td class="p-6 opacity-60" x-text="formatDate(item.date)"></td>
                                        </template>
                                        <template x-if="adminTab === 'members'">
                                            <td class="p-6">
                                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase" :class="item.status === 'Aktif' ? 'bg-emerald-100 text-emerald-600' : 'bg-rose-100 text-rose-600'" x-text="item.status"></span>
                                            </td>
                                        </template>
                                        <template x-if="adminTab === 'finance'">
                                            <td class="p-6 font-bold" :class="item.type === 'Pemasukan' ? 'text-emerald-600' : 'text-rose-600'" x-text="formatCurrency(item.amount)"></td>
                                        </template>
                                        <td class="p-6 text-right">
                                            <div class="flex justify-end gap-2">
                                                <button @click="handleView(item)" class="p-2 hover:bg-church-warm/50 rounded-lg text-church-dark/40 hover:text-church-gold transition-all">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                </button>
                                                <button @click="handleEdit(item)" class="p-2 hover:bg-church-warm/50 rounded-lg text-church-dark/40 hover:text-church-gold transition-all">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                </button>
                                                <button @click="handleDelete(item.id)" class="p-2 hover:bg-rose-50 rounded-lg text-church-dark/40 hover:text-rose-500 transition-all">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Form View (Create/Edit) -->
                <div x-show="adminTab !== 'dashboard' && (adminViewMode === 'create' || adminViewMode === 'edit')" class="bg-white p-8 rounded-[40px] card-shadow border border-black/5">
                    <div class="flex items-center gap-4 mb-8">
                        <button @click="adminViewMode = 'list'" class="p-2 hover:bg-church-warm/50 rounded-full text-church-dark/40">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        </button>
                        <h3 class="text-2xl font-serif" x-text="adminViewMode === 'create' ? 'Tambah Data Baru' : 'Edit Data'"></h3>
                    </div>
                    <form class="space-y-6" @submit.prevent="handleSave()">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <template x-if="adminTab !== 'finance' && adminTab !== 'members'">
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-bold uppercase tracking-widest opacity-40 mb-2">Judul</label>
                                    <input type="text" x-model="adminFormData.title" required class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold">
                                </div>
                            </template>
                            <template x-if="adminTab === 'members'">
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-bold uppercase tracking-widest opacity-40 mb-2">Nama Lengkap</label>
                                    <input type="text" x-model="adminFormData.name" required class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold">
                                </div>
                            </template>
                            <template x-if="adminTab === 'finance'">
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-bold uppercase tracking-widest opacity-40 mb-2">Kategori</label>
                                    <input type="text" x-model="adminFormData.category" required class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold">
                                </div>
                            </template>

                            <template x-if="adminTab === 'devotionals' || adminTab === 'articles'">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-widest opacity-40 mb-2">Penulis</label>
                                    <input type="text" x-model="adminFormData.author" required class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold">
                                </div>
                            </template>
                            <template x-if="adminTab === 'warta'">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-widest opacity-40 mb-2">Tipe Warta</label>
                                    <select x-model="adminFormData.type" class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold">
                                        <option value="jemaat">Warta Jemaat</option>
                                        <option value="kegiatan">Warta Kegiatan</option>
                                        <option value="kebaktian">Warta Kebaktian</option>
                                    </select>
                                </div>
                            </template>
                            <template x-if="adminTab === 'articles'">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-widest opacity-40 mb-2">Kategori</label>
                                    <select x-model="adminFormData.category" class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold">
                                        <option value="teologis">Teologis</option>
                                        <option value="humanis">Humanis</option>
                                        <option value="khotbah">Khotbah Minggu</option>
                                        <option value="liturgi">Liturgi</option>
                                    </select>
                                </div>
                            </template>
                            <template x-if="adminTab === 'members'">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-widest opacity-40 mb-2">Email</label>
                                    <input type="email" x-model="adminFormData.email" class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold">
                                </div>
                            </template>
                            <template x-if="adminTab === 'members'">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-widest opacity-40 mb-2">Telepon</label>
                                    <input type="text" x-model="adminFormData.phone" class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold">
                                </div>
                            </template>
                            <template x-if="adminTab === 'finance'">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-widest opacity-40 mb-2">Tipe</label>
                                    <select x-model="adminFormData.type" class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold">
                                        <option value="Pemasukan">Pemasukan</option>
                                        <option value="Pengeluaran">Pengeluaran</option>
                                    </select>
                                </div>
                            </template>

                            <template x-if="adminTab !== 'members'">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-widest opacity-40 mb-2">Tanggal</label>
                                    <input type="date" x-model="adminFormData.date" required class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold">
                                </div>
                            </template>
                            <template x-if="adminTab === 'members'">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-widest opacity-40 mb-2">Status</label>
                                    <select x-model="adminFormData.status" class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Non-Aktif">Non-Aktif</option>
                                    </select>
                                </div>
                            </template>
                            <template x-if="adminTab === 'finance'">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-widest opacity-40 mb-2">Jumlah (Rp)</label>
                                    <input type="number" x-model="adminFormData.amount" required class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold">
                                </div>
                            </template>

                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold uppercase tracking-widest opacity-40 mb-2" x-text="adminTab === 'members' ? 'Alamat' : 'Konten / Deskripsi'"></label>
                                <template x-if="adminTab === 'devotionals' || adminTab === 'articles'">
                                    <textarea x-model="adminFormData.content" rows="8" required class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold"></textarea>
                                </template>
                                <template x-if="adminTab === 'warta' || adminTab === 'finance'">
                                    <textarea x-model="adminFormData.description" rows="8" required class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold"></textarea>
                                </template>
                                <template x-if="adminTab === 'members'">
                                    <textarea x-model="adminFormData.address" rows="8" required class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold"></textarea>
                                </template>
                            </div>
                        </div>
                        <div class="flex justify-end gap-4 pt-6">
                            <button type="button" @click="adminViewMode = 'list'" class="px-8 py-4 rounded-2xl font-bold text-church-dark/40 hover:bg-church-warm/50 transition-all">Batal</button>
                            <button type="submit" class="bg-church-gold text-white px-12 py-4 rounded-2xl font-bold shadow-lg shadow-church-gold/20">Simpan Data</button>
                        </div>
                    </form>
                </div>

                <!-- View Mode -->
                <div x-show="adminTab !== 'dashboard' && adminViewMode === 'view' && selectedAdminItem" class="bg-white p-10 rounded-[40px] card-shadow border border-black/5">
                    <div class="flex items-center gap-4 mb-10">
                        <button @click="adminViewMode = 'list'" class="p-2 hover:bg-church-warm/50 rounded-full text-church-dark/40">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        </button>
                        <h3 class="text-2xl font-serif">Detail Data</h3>
                    </div>
                    <div class="space-y-8">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-widest opacity-40 block mb-2">Judul / Nama</span>
                            <h2 class="text-3xl font-serif" x-text="selectedAdminItem.title || selectedAdminItem.name"></h2>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                            <template x-if="selectedAdminItem.date">
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-widest opacity-40 block mb-1">Tanggal</span>
                                    <p class="font-medium" x-text="formatDate(selectedAdminItem.date)"></p>
                                </div>
                            </template>
                            <template x-if="selectedAdminItem.author">
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-widest opacity-40 block mb-1">Penulis</span>
                                    <p class="font-medium" x-text="selectedAdminItem.author"></p>
                                </div>
                            </template>
                            <template x-if="selectedAdminItem.category">
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-widest opacity-40 block mb-1">Kategori</span>
                                    <p class="font-medium capitalize" x-text="selectedAdminItem.category"></p>
                                </div>
                            </template>
                            <template x-if="selectedAdminItem.status">
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-widest opacity-40 block mb-1">Status</span>
                                    <p class="font-medium" x-text="selectedAdminItem.status"></p>
                                </div>
                            </template>
                            <template x-if="selectedAdminItem.amount">
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-widest opacity-40 block mb-1">Nominal</span>
                                    <p class="font-bold text-xl" :class="selectedAdminItem.type === 'Pemasukan' ? 'text-emerald-600' : 'text-rose-600'" x-text="formatCurrency(selectedAdminItem.amount)"></p>
                                </div>
                            </template>
                            <template x-if="selectedAdminItem.email">
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-widest opacity-40 block mb-1">Email</span>
                                    <p class="font-medium" x-text="selectedAdminItem.email"></p>
                                </div>
                            </template>
                            <template x-if="selectedAdminItem.phone">
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-widest opacity-40 block mb-1">Telepon</span>
                                    <p class="font-medium" x-text="selectedAdminItem.phone"></p>
                                </div>
                            </template>
                        </div>
                        <div class="pt-8 border-t border-black/5">
                            <span class="text-[10px] font-bold uppercase tracking-widest opacity-40 block mb-4">Konten / Deskripsi / Alamat</span>
                            <div class="text-church-dark/70 leading-relaxed whitespace-pre-wrap font-serif text-lg" x-text="selectedAdminItem.content || selectedAdminItem.description || selectedAdminItem.address"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User View -->
        <div x-show="!isAdminMode">
            <!-- Detail View: Devotional -->
        <template x-if="selectedDevotional">
            <div class="max-w-4xl mx-auto">
                <button @click="selectedDevotional = null" class="flex items-center gap-2 text-church-gold font-bold mb-8 hover:gap-3 transition-all">
                    <svg class="w-5 h-5 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    Kembali ke Daftar
                </button>
                <div class="bg-white p-10 rounded-[40px] card-shadow border border-black/5">
                    <span class="text-church-gold font-bold text-xs uppercase tracking-widest mb-4 block" x-text="formatDate(selectedDevotional.date)"></span>
                    <h1 class="text-4xl md:text-5xl font-serif mb-6 leading-tight" x-text="selectedDevotional.title"></h1>
                    <div class="flex items-center gap-2 text-sm opacity-50 italic mb-10 pb-6 border-b border-black/5">
                        Oleh: <span x-text="selectedDevotional.author"></span>
                    </div>
                    <div class="text-church-dark/80 text-lg leading-relaxed space-y-6 whitespace-pre-wrap font-serif" x-text="selectedDevotional.content"></div>
                </div>
            </div>
        </template>

        <!-- Detail View: Article -->
        <template x-if="selectedArticle">
            <div class="max-w-4xl mx-auto">
                <button @click="selectedArticle = null" class="flex items-center gap-2 text-church-gold font-bold mb-8 hover:gap-3 transition-all">
                    <svg class="w-5 h-5 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    Kembali ke Daftar
                </button>
                <div class="bg-white p-10 rounded-[40px] card-shadow border border-black/5">
                    <span class="text-church-gold font-bold text-xs uppercase tracking-widest mb-4 block">
                        <span x-text="selectedArticle.category.toUpperCase()"></span> • <span x-text="formatDate(selectedArticle.date)"></span>
                    </span>
                    <h1 class="text-4xl md:text-5xl font-serif mb-6 leading-tight" x-text="selectedArticle.title"></h1>
                    <div class="flex items-center gap-2 text-sm opacity-50 italic mb-10 pb-6 border-b border-black/5">
                        Oleh: <span x-text="selectedArticle.author"></span>
                    </div>
                    <div class="text-church-dark/80 text-lg leading-relaxed space-y-6 whitespace-pre-wrap" x-text="selectedArticle.content"></div>
                </div>
            </div>
        </template>

        <!-- Tab Content -->
        <div x-show="!selectedDevotional && !selectedArticle">
            
            <!-- Home Page -->
            <div x-show="activeTab === 'home'">
                <section class="relative h-[50vh] md:h-[60vh] rounded-[40px] overflow-hidden mb-16 group">
                    <img src="https://picsum.photos/seed/sudirman/1920/1080" alt="GKI Sudirman" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent flex flex-col justify-end p-8 md:p-16 text-white">
                        <h1 class="text-4xl md:text-6xl font-serif mb-4 leading-tight">Selamat Datang di <br> <span class="text-church-gold">GKI Sudirman</span></h1>
                        <p class="text-white/70 text-base md:text-lg max-w-xl mb-8">Rumah bagi setiap jiwa yang rindu bertumbuh dalam iman dan melayani sesama dengan kasih Kristus.</p>
                        <div class="flex flex-wrap gap-4">
                            <button @click="activeTab = 'warta-kebaktian'" class="bg-church-gold text-white px-8 py-3.5 rounded-full font-bold shadow-lg shadow-church-gold/30">Jadwal Ibadah</button>
                            <button @click="activeTab = 'kontak'" class="bg-white/10 backdrop-blur-md border border-white/20 px-8 py-3.5 rounded-full font-bold">Hubungi Kami</button>
                        </div>
                    </div>
                </section>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <div class="lg:col-span-2 space-y-16">
                        <section>
                            <div class="mb-10">
                                <h2 class="text-3xl font-serif mb-2">Renungan Hari Ini</h2>
                                <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
                            </div>
                            <div class="bg-white p-8 rounded-3xl card-shadow border border-black/5 cursor-pointer group" @click="selectedDevotional = devotionals[0]">
                                <div class="flex flex-col md:flex-row gap-8">
                                    <div class="flex-1">
                                        <span class="text-church-gold font-bold text-xs uppercase tracking-widest mb-3 block" x-text="formatDate(devotionals[0].date)"></span>
                                        <h3 class="text-3xl font-serif mb-4 group-hover:text-church-gold transition-colors" x-text="devotionals[0].title"></h3>
                                        <p class="text-church-dark/60 mb-6 line-clamp-3 leading-relaxed" x-text="devotionals[0].content"></p>
                                        <span class="text-church-gold font-bold flex items-center gap-1">Baca Selengkapnya</span>
                                    </div>
                                    <div class="w-full md:w-48 h-48 rounded-2xl overflow-hidden shrink-0">
                                        <img src="https://picsum.photos/seed/dev-1/400/400" class="w-full h-full object-cover">
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="space-y-12">
                        <section>
                            <h3 class="text-2xl font-serif mb-6 flex items-center gap-2">HUT Jemaat</h3>
                            <div class="bg-white rounded-3xl p-6 card-shadow border border-black/5 space-y-4">
                                <template x-for="b in birthdays" :key="b.name">
                                    <div class="flex items-center justify-between border-b border-black/5 pb-3 last:border-0">
                                        <span class="font-medium" x-text="b.name"></span>
                                        <span class="text-sm opacity-60" x-text="b.date"></span>
                                    </div>
                                </template>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <!-- Warta Kebaktian -->
            <div x-show="activeTab === 'warta-kebaktian'">
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

            <!-- Warta Jemaat / Kegiatan -->
            <div x-show="activeTab === 'warta-jemaat' || activeTab === 'warta-kegiatan'">
                <div class="mb-10">
                    <h2 class="text-3xl font-serif mb-2" x-text="activeTab === 'warta-jemaat' ? 'Warta Jemaat' : 'Warta Kegiatan'"></h2>
                    <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <template x-for="item in warta.filter(w => activeTab.includes(w.type))" :key="item.title">
                        <div class="bg-white rounded-3xl overflow-hidden card-shadow border border-black/5 flex flex-col">
                            <img :src="item.image_url" class="h-48 w-full object-cover">
                            <div class="p-6">
                                <span class="text-[10px] font-bold uppercase tracking-widest text-church-gold mb-2 block" x-text="formatDate(item.date)"></span>
                                <h3 class="text-xl font-serif mb-3" x-text="item.title"></h3>
                                <p class="text-sm text-church-dark/60 mb-6" x-text="item.description"></p>
                                <button class="w-full py-3 bg-church-warm/30 rounded-xl text-xs font-bold">Lihat Detail</button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Renungan List -->
            <div x-show="activeTab === 'renungan'">
                <div class="mb-10">
                    <h2 class="text-3xl font-serif mb-2">Renungan Harian</h2>
                    <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <template x-for="d in devotionals" :key="d.title">
                        <div @click="selectedDevotional = d" class="bg-white p-8 rounded-3xl card-shadow border border-black/5 cursor-pointer group">
                            <span class="text-church-gold font-bold text-[10px] uppercase tracking-widest mb-3 block" x-text="formatDate(d.date)"></span>
                            <h3 class="text-2xl font-serif mb-4 group-hover:text-church-gold transition-colors" x-text="d.title"></h3>
                            <p class="text-church-dark/60 text-sm line-clamp-4 leading-relaxed mb-6" x-text="d.content"></p>
                            <div class="flex items-center justify-between pt-4 border-t border-black/5">
                                <span class="text-xs italic opacity-40">Oleh: <span x-text="d.author"></span></span>
                                <svg class="w-5 h-5 text-church-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Artikel List -->
            <div x-show="activeTab.startsWith('artikel-')">
                <div class="mb-10">
                    <h2 class="text-3xl font-serif mb-2 capitalize" x-text="activeTab.replace('artikel-', 'Artikel ')"></h2>
                    <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
                </div>
                <div class="max-w-4xl mx-auto space-y-8">
                    <template x-for="a in articles.filter(art => activeTab.includes(art.category))" :key="a.title">
                        <div @click="selectedArticle = a" class="bg-white p-8 rounded-3xl card-shadow border border-black/5 cursor-pointer group hover:border-church-gold/30 transition-all">
                            <h3 class="text-2xl font-serif mb-3 group-hover:text-church-gold transition-colors" x-text="a.title"></h3>
                            <div class="flex items-center gap-4 text-xs opacity-50 mb-6">
                                <span x-text="a.author"></span>
                                <span>•</span>
                                <span x-text="formatDate(a.date)"></span>
                            </div>
                            <p class="text-church-dark/70 leading-relaxed line-clamp-3" x-text="a.content"></p>
                            <button class="mt-6 text-church-gold font-bold text-sm">Baca Selengkapnya</button>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Bible Reading Page -->
            <div x-show="activeTab === 'tentang-alkitab'">
                <div class="mb-10">
                    <h2 class="text-3xl font-serif mb-2">Program Baca Alkitab 1 Tahun</h2>
                    <p class="text-church-dark/50 italic">Mari selesaikan pembacaan Alkitab dalam 365 hari</p>
                    <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
                </div>

                <div class="flex gap-2 overflow-x-auto pb-6 mb-8 no-scrollbar">
                    <template x-for="(m, i) in months" :key="m">
                        <button 
                            @click="activeMonth = i"
                            class="px-6 py-2 rounded-full font-bold text-sm whitespace-nowrap transition-all"
                            :class="activeMonth === i ? 'bg-church-gold text-white shadow-lg' : 'bg-white text-church-dark/40 border border-black/5'"
                            x-text="m">
                        </button>
                    </template>
                </div>

                <div class="bg-white rounded-[40px] card-shadow border border-black/5 overflow-hidden">
                    <div class="p-8 border-b border-black/5 bg-church-warm/10 flex justify-between items-center">
                        <h3 class="text-2xl font-serif">Jadwal Bulan <span x-text="months[activeMonth]"></span></h3>
                        <div class="text-sm font-bold text-church-gold">
                            <span x-text="getMonthlyProgress()"></span> / 30 Selesai
                        </div>
                    </div>
                    <div class="divide-y divide-black/5">
                        <template x-for="day in getDaysInMonth()" :key="day">
                            <div @click="toggleBibleDay(day)" class="flex items-center justify-between p-6 hover:bg-church-warm/20 transition-colors cursor-pointer group">
                                <div class="flex items-center gap-6">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-all"
                                        :class="isDayChecked(day) ? 'bg-church-gold text-white' : 'bg-church-warm/30 text-church-dark/30 group-hover:bg-church-warm/50'">
                                        <span x-text="day % 30 || 30"></span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg" x-text="getPassage(day)"></h4>
                                        <p class="text-xs opacity-40">Pembacaan Hari ke-<span x-text="day"></span></p>
                                    </div>
                                </div>
                                <div x-show="isDayChecked(day)" class="text-church-gold">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                </div>
                                <div x-show="!isDayChecked(day)" class="w-6 h-6 rounded-full border-2 border-black/10 group-hover:border-church-gold/30 transition-all"></div>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="mt-12 bg-church-dark text-white p-10 rounded-[40px] flex flex-col md:flex-row items-center justify-between gap-8">
                    <div class="text-center md:text-left">
                        <h4 class="text-2xl font-serif text-church-gold mb-2">Progres Keseluruhan</h4>
                        <p class="text-sm opacity-60">Teruslah setia dalam membaca Firman Tuhan setiap hari.</p>
                    </div>
                    <div class="flex items-center gap-6">
                        <div class="text-right">
                            <span class="text-4xl font-serif text-church-gold" x-text="bibleChecked.length"></span>
                            <span class="text-xl opacity-40 ml-2">/ 365</span>
                        </div>
                        <div class="w-32 h-2 bg-white/10 rounded-full overflow-hidden">
                            <div class="h-full bg-church-gold transition-all duration-500" :style="'width: ' + ((bibleChecked.length / 365) * 100) + '%'"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Visi Misi Page -->
            <div x-show="activeTab === 'tentang-visi'">
                <div class="mb-10">
                    <h2 class="text-3xl font-serif mb-2">Visi & Misi</h2>
                    <p class="text-church-dark/50 italic">Arah dan tujuan GKI Sudirman</p>
                    <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
                </div>
                <div class="max-w-4xl mx-auto space-y-4">
                    <div class="bg-white rounded-2xl border border-black/5 overflow-hidden card-shadow" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-church-warm/20 transition-colors">
                            <span class="font-serif text-xl">Visi GKI Sudirman</span>
                            <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="p-6 pt-0 text-church-dark/70 leading-relaxed border-t border-black/5">
                            Menjadi komunitas yang inklusif, komunikatif, dan transformatif di tengah masyarakat.
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-black/5 overflow-hidden card-shadow" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-church-warm/20 transition-colors">
                            <span class="font-serif text-xl">Misi GKI Sudirman</span>
                            <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="p-6 pt-0 text-church-dark/70 leading-relaxed border-t border-black/5">
                            1. Memberitakan Injil melalui kata dan perbuatan.<br>
                            2. Mewujudkan persekutuan yang hangat bagi semua orang.<br>
                            3. Melayani sesama dengan kasih Kristus.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Keanggotaan Page -->
            <div x-show="activeTab === 'tentang-keanggotaan'">
                <div class="mb-10">
                    <h2 class="text-3xl font-serif mb-2">Keanggotaan</h2>
                    <p class="text-church-dark/50 italic">Informasi seputar keanggotaan jemaat</p>
                    <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
                </div>
                <div class="max-w-4xl mx-auto space-y-4">
                    <div class="bg-white rounded-2xl border border-black/5 overflow-hidden card-shadow" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-church-warm/20 transition-colors">
                            <span class="font-serif text-xl">Cara Menjadi Anggota (Atestasi Masuk)</span>
                            <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="p-6 pt-0 text-church-dark/70 leading-relaxed border-t border-black/5">
                            Jemaat dapat mengajukan surat atestasi dari gereja asal dengan melampirkan fotokopi surat baptis/sidi dan pas foto terbaru.
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-black/5 overflow-hidden card-shadow" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-church-warm/20 transition-colors">
                            <span class="font-serif text-xl">Atestasi Keluar</span>
                            <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="p-6 pt-0 text-church-dark/70 leading-relaxed border-t border-black/5">
                            Bagi jemaat yang akan pindah keanggotaan, silakan mengajukan permohonan tertulis kepada Majelis Jemaat.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Baptis & Nikah Page -->
            <div x-show="activeTab === 'tentang-baptis'">
                <div class="mb-10">
                    <h2 class="text-3xl font-serif mb-2">Baptisan & Pernikahan</h2>
                    <p class="text-church-dark/50 italic">Persyaratan dan prosedur pelayanan</p>
                    <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
                </div>
                <div class="max-w-4xl mx-auto space-y-4">
                    <div class="bg-white rounded-2xl border border-black/5 overflow-hidden card-shadow" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-church-warm/20 transition-colors">
                            <span class="font-serif text-xl">Baptis Kudus Anak</span>
                            <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="p-6 pt-0 text-church-dark/70 leading-relaxed border-t border-black/5">
                            Persyaratan: Fotokopi akta kelahiran anak, surat nikah orang tua, dan salah satu orang tua adalah anggota GKI Sudirman.
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-black/5 overflow-hidden card-shadow" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-church-warm/20 transition-colors">
                            <span class="font-serif text-xl">Peneguhan & Pemberkatan Nikah</span>
                            <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="p-6 pt-0 text-church-dark/70 leading-relaxed border-t border-black/5">
                            Prosedur: Mengisi formulir pendaftaran minimal 3 bulan sebelum hari H dan mengikuti katekisasi pranikah.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Struktur Kemajelisan Page -->
            <div x-show="activeTab === 'tentang-struktur'">
                <div class="mb-10">
                    <h2 class="text-3xl font-serif mb-2">Struktur Kemajelisan</h2>
                    <p class="text-church-dark/50 italic">Daftar pelayan Tuhan di GKI Sudirman</p>
                    <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-4xl mx-auto">
                    <template x-for="person in structure" :key="person.name">
                        <div class="bg-white p-6 rounded-2xl border border-black/5 card-shadow flex items-center gap-4">
                            <div class="w-12 h-12 bg-church-gold/10 rounded-full flex items-center justify-center text-church-gold font-bold" x-text="person.name.charAt(0)"></div>
                            <div>
                                <h4 class="font-bold" x-text="person.name"></h4>
                                <p class="text-xs opacity-50" x-text="person.role"></p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Kontak Page -->
            <div x-show="activeTab === 'kontak'">
                <div class="mb-10">
                    <h2 class="text-3xl font-serif mb-2">Hubungi Kami</h2>
                    <div class="w-16 h-1 bg-church-gold mt-3 rounded-full"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div class="space-y-8">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-church-gold/10 rounded-2xl text-church-gold">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold mb-1">Alamat</h4>
                                <p class="text-sm text-church-dark/60">Jl. Sudirman No. 123, Jakarta Pusat</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-church-gold/10 rounded-2xl text-church-gold">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold mb-1">Telepon</h4>
                                <p class="text-sm text-church-dark/60">(021) 12345678</p>
                            </div>
                        </div>
                    </div>
                    <form class="bg-white p-8 rounded-[40px] card-shadow border border-black/5 space-y-4">
                        <input type="text" placeholder="Nama Lengkap" class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold">
                        <input type="email" placeholder="Alamat Email" class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold">
                        <textarea placeholder="Pesan Anda" rows="5" class="w-full p-4 rounded-2xl bg-church-warm/20 border border-black/5 outline-none focus:border-church-gold"></textarea>
                        <button class="w-full bg-church-dark text-white py-4 rounded-2xl font-bold">Kirim Pesan</button>
                    </form>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-church-dark text-white py-20 px-4 mt-20">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12">
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-church-gold rounded-full flex items-center justify-center text-white font-serif text-xl font-bold">S</div>
                    <span class="text-xl font-serif font-bold">GKI Sudirman</span>
                </div>
                <p class="text-white/40 text-sm leading-relaxed">Melayani dengan kasih, bertumbuh dalam iman, dan menjadi berkat bagi sesama.</p>
            </div>
            <div>
                <h4 class="font-serif text-xl mb-6 text-church-gold">Tautan Cepat</h4>
                <ul class="space-y-3 text-sm text-white/50">
                    <li><button @click="activeTab = 'home'" class="hover:text-church-gold">Beranda</button></li>
                    <li><button @click="activeTab = 'renungan'" class="hover:text-church-gold">Renungan Harian</button></li>
                    <li><button @click="activeTab = 'kontak'" class="hover:text-church-gold">Hubungi Kami</button></li>
                </ul>
            </div>
            <div>
                <h4 class="font-serif text-xl mb-6 text-church-gold">Lokasi</h4>
                <p class="text-sm text-white/50 mb-4">Jl. Sudirman No. 123, Jakarta Pusat</p>
            </div>
        </div>
        <div class="max-w-7xl mx-auto mt-20 pt-8 border-t border-white/5 text-center text-[10px] uppercase tracking-widest text-white/20">
            &copy; 2026 GKI Sudirman. All rights reserved.
        </div>
    </footer>

</body>
</html>
