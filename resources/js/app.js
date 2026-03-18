import './bootstrap'
import Alpine from 'alpinejs'

window.Alpine = Alpine

// Alpine.data('app', () => ({
//     activeTab: 'home',
//     mobileMenuOpen: false,
//     activeDropdown: null,
//     selectedDevotional: null,
//     selectedArticle: null,
//     activeMonth: 0,
//     bibleChecked: JSON.parse(localStorage.getItem('bibleChecked') || '[]'),

//     navItems: [
//         { id: 'home', label: 'Home' },
//         {
//             id: 'warta', label: 'Warta',
//             subItems: [
//                 { id: 'warta-kebaktian', label: 'Warta Kebaktian' },
//                 { id: 'warta-jemaat', label: 'Warta Jemaat' },
//                 { id: 'warta-kegiatan', label: 'Warta Kegiatan' },
//             ]
//         },
//         { id: 'renungan', label: 'Renungan Harian' },
//         {
//             id: 'artikel', label: 'Artikel',
//             subItems: [
//                 { id: 'artikel-teologis', label: 'Artikel Teologis' },
//                 { id: 'artikel-humanis', label: 'Artikel Humanis' },
//                 { id: 'artikel-khotbah', label: 'Khotbah Minggu' },
//                 { id: 'artikel-liturgi', label: 'Liturgi' },
//             ]
//         },
//         {
//             id: 'tentang', label: 'Tentang Kami',
//             subItems: [
//                 { id: 'tentang-visi', label: 'Visi Misi' },
//                 { id: 'tentang-keanggotaan', label: 'Keanggotaan' },
//                 { id: 'tentang-baptis', label: 'Baptis & Nikah' },
//                 { id: 'tentang-struktur', label: 'Struktur Kemajelisan' },
//                 { id: 'tentang-alkitab', label: 'Baca Alkitab 1 Tahun' },
//             ]
//         },
//         { id: 'kontak', label: 'Hubungi Kami' },
//     ],

//     months: ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],

//     formatDate(dateStr) {
//         const options = { day: 'numeric', month: 'long', year: 'numeric' }
//         return new Date(dateStr).toLocaleDateString('id-ID', options)
//     },
// }))

Alpine.start()