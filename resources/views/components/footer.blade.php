<footer class="bg-church-dark text-white py-20 px-4 mt-20">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12">
        <div>
            <div class="flex items-center gap-3 mb-6">
                <img src="{{ asset('logo.png') }}" alt="GKI Sudirman" class="w-10 h-10 rounded-full">
                {{-- <div class="w-10 h-10 bg-church-gold rounded-full flex items-center justify-center text-white font-serif text-xl font-bold">S</div> --}}
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
            <p class="text-sm text-white/50 mb-4">Jl. Jenderal Sudirman No. 638, Bandung 40183</p>
        </div>
    </div>
    <div class="max-w-7xl mx-auto mt-20 pt-8 border-t border-white/5 text-center text-[10px] uppercase tracking-widest text-white/20">
        &copy; 2026 GKI Sudirman
    </div>
</footer>