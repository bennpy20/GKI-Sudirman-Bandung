<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tailwind CSS CDN -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <!-- Alpine.js for Interactivity -->
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body class="bg-church-warm/30 font-sans text-church-dark" 
    x-data="{
        currentRoute: '{{ Route::currentRouteName() }}',
        mobileMenuOpen: false,
        activeDropdown: null,
        selectedDevotional: null,
        selectedArticle: null,
        activeMonth: 0,
        bibleChecked: JSON.parse(localStorage.getItem('bibleChecked') || '[]'),
        
        navItems: [
            { id: 'home.index', label: 'Home', url: '{{ route('home.index') }}' },
            { 
                id: 'warta', label: 'Warta', url: '#',
                subItems: [
                    { id: 'warta_kebaktian.index', label: 'Warta Kebaktian', url: '{{ route('warta.kategori', 'kebaktian') }}' },
                    { id: 'warta_jemaat.index', label: 'Warta Jemaat', url: '{{ route('warta.kategori', 'jemaat') }}' },
                    { id: 'warta_kegiatan.index', label: 'Warta Kegiatan', url: '{{ route('warta.kategori', 'kegiatan') }}' },
                ]
            },
            { id: 'renungan_harian.index', label: 'Renungan Harian', url: '{{ route('renungan_harian.index') }}' },
            { 
                id: 'artikel', label: 'Artikel', url: '#',
                subItems: [
                    { id: 'artikel.teologis', label: 'Artikel Teologis', url: '{{ route('artikel_teologis.index') }}' },
                    { id: 'artikel.humanis', label: 'Artikel Humanis', url: '#' },
                    { id: 'artikel.khotbah', label: 'Khotbah Minggu', url: '#' },
                    { id: 'artikel.liturgi', label: 'Liturgi', url: '#' },
                ]
            },
            { 
                id: 'tentang', label: 'Tentang Kami', url: '#',
                subItems: [
                    { id: 'tentang_visi.index', label: 'Visi Misi', url: '{{ route('visi_misi.index') }}' },
                    { id: 'tentang.keanggotaan', label: 'Keanggotaan', url: '#' },
                    { id: 'tentang.baptis', label: 'Baptis & Nikah', url: '#' },
                    { id: 'tentang.struktur', label: 'Struktur Kemajelisan', url: '#' },
                    { id: 'tentang.alkitab', label: 'Baca Alkitab 1 Tahun', url: '#' },
                ]
            },
            { id: 'kontak', label: 'Hubungi Kami', url: '{{ route('hubungi_kami.index') }}' },
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
            { type: 'jemaat', title: 'Baptis Kudus Anak', description: 'Akan dilaksanakan pada hari Minggu, 5 April 2026. Bagi orang tua yang rindu membaptiskan anaknya, silakan menghubungi sekretariat gereja.', image_url: 'https://picsum.photos/seed/baptism/800/600', date: '2026-03-01' },
            { type: 'kegiatan', title: 'Retreat Pemuda 2026', description: 'Mari bergabung dalam retreat pemuda bertema \'Rooted in Christ\' yang akan diadakan di Puncak pada 15-17 Mei 2026.', image_url: 'https://picsum.photos/seed/retreat/800/600', date: '2026-03-15' },
        ],

        articles: [
            { category: 'teologis', title: 'Memahami Kasih Karunia', content: 'Kasih karunia adalah konsep sentral dalam iman Kristen. Seringkali kita terjebak dalam pemikiran bahwa kita harus \'layak\' untuk menerima kasih Tuhan. Namun, esensi dari kasih karunia adalah pemberian yang tidak layak kita terima, namun diberikan secara cuma-cuma oleh Allah melalui Kristus...', author: 'Pdt. Yohanes', date: '2026-02-20' },
        ],

        birthdays: [
            { name: 'Budi Santoso', date: '15 Maret' },
            { name: 'Yohana Maria', date: '27 Februari' },
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
        }
    }" 
    x-cloak>
    @include('components.navbar')

    <div class="pt-24">
        <main class="pt-8 pb-8 px-4 max-w-7xl mx-auto">
            @yield('content')
        </main>
    </div>

    @include('components.footer')

    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
</body>
</html>