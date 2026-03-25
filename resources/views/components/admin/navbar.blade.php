<aside x-cloak :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-church-dark to-slate-900 text-white transition-transform duration-300 ease-in-out md:static md:translate-x-0 flex flex-col shadow-2xl border-r border-church-gold/20">
    <div class="h-16 flex items-center justify-between md:justify-center border-b border-white/10 px-5">
        <h1 class="text-lg font-serif font-bold text-church-gold tracking-widest">GKI Sudirman</h1>
        <button @click="sidebarOpen = false" class="md:hidden text-white/70 hover:text-church-gold">
            <i class="fas fa-times text-lg"></i>
        </button>
    </div>
    
    <div class="px-4 py-6 flex-1 overflow-y-auto w-full no-scrollbar">
        <nav class="space-y-2">
            <a href="{{ route('admin.dashboard.index') }}" class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.dashboard.*') || request()->is('admin') ? 'bg-gradient-to-r from-church-gold to-yellow-600 text-church-dark shadow-[0_4px_20px_rgba(197,160,89,0.3)] transform hover:-translate-y-0.5' : 'text-white/70 hover:bg-white/5 hover:text-church-gold group' }}">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors {{ request()->routeIs('admin.dashboard.*') || request()->is('admin') ? 'bg-church-dark/10 text-church-dark' : 'bg-white/5 group-hover:bg-church-gold/20 group-hover:text-church-gold' }}">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <span class="text-sm {{ request()->routeIs('admin.dashboard.*') || request()->is('admin') ? 'font-bold' : 'font-medium' }}">Dashboard</span>
            </a>
            
            <a href="{{ route('admin.member.index') }}" class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.member.*') ? 'bg-gradient-to-r from-church-gold to-yellow-600 text-church-dark shadow-[0_4px_20px_rgba(197,160,89,0.3)] transform hover:-translate-y-0.5' : 'text-white/70 hover:bg-white/5 hover:text-church-gold group' }}">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors {{ request()->routeIs('admin.member.*') ? 'bg-church-dark/10 text-church-dark' : 'bg-white/5 group-hover:bg-church-gold/20 group-hover:text-church-gold' }}">
                    <i class="fas fa-users"></i>
                </div>
                <span class="text-sm {{ request()->routeIs('admin.member.*') ? 'font-bold' : 'font-medium' }}">Data Jemaat</span>
            </a>

            <a href="{{ route('admin.worship.index') }}" class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.worship.*') ? 'bg-gradient-to-r from-church-gold to-yellow-600 text-church-dark shadow-[0_4px_20px_rgba(197,160,89,0.3)] transform hover:-translate-y-0.5' : 'text-white/70 hover:bg-white/5 hover:text-church-gold group' }}">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors {{ request()->routeIs('admin.worship.*') ? 'bg-church-dark/10 text-church-dark' : 'bg-white/5 group-hover:bg-church-gold/20 group-hover:text-church-gold' }}">
                    <i class="fas fa-church"></i>
                </div>
                <span class="text-sm {{ request()->routeIs('admin.worship.*') ? 'font-bold' : 'font-medium' }}">Ibadah Minggu</span>
            </a>
            
            <!-- Publikasi & Konten Section -->
            <div class="pt-4 pb-2">
                <p class="text-[10px] font-bold text-church-gold/60 uppercase tracking-widest px-2">Publikasi & Konten</p>
            </div>

            <a href="{{ route('admin.announcement.index') }}" class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.announcement.*') ? 'bg-gradient-to-r from-church-gold to-yellow-600 text-church-dark shadow-[0_4px_20px_rgba(197,160,89,0.3)] transform hover:-translate-y-0.5' : 'text-white/70 hover:bg-white/5 hover:text-church-gold group' }}">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors {{ request()->routeIs('admin.announcement.*') ? 'bg-church-dark/10 text-church-dark' : 'bg-white/5 group-hover:bg-church-gold/20 group-hover:text-church-gold' }}">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <span class="text-sm {{ request()->routeIs('admin.announcement.*') ? 'font-bold' : 'font-medium' }}">Warta Jemaat</span>
            </a>
            
            <a href="{{ route('admin.devotion.index') }}" class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.devotion.*') ? 'bg-gradient-to-r from-church-gold to-yellow-600 text-church-dark shadow-[0_4px_20px_rgba(197,160,89,0.3)] transform hover:-translate-y-0.5' : 'text-white/70 hover:bg-white/5 hover:text-church-gold group' }}">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors {{ request()->routeIs('admin.devotion.*') ? 'bg-church-dark/10 text-church-dark' : 'bg-white/5 group-hover:bg-church-gold/20 group-hover:text-church-gold' }}">
                    <i class="fas fa-book-reader"></i>
                </div>
                <span class="text-sm {{ request()->routeIs('admin.devotion.*') ? 'font-bold' : 'font-medium' }}">Renungan Harian</span>
            </a>

            <!-- Profil Gereja Section -->
            <div class="pt-4 pb-2">
                <p class="text-[10px] font-bold text-church-gold/60 uppercase tracking-widest px-2">Profil Gereja</p>
            </div>
            
            <a href="{{ route('admin.about.index') }}" class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.about.*') ? 'bg-gradient-to-r from-church-gold to-yellow-600 text-church-dark shadow-[0_4px_20px_rgba(197,160,89,0.3)] transform hover:-translate-y-0.5' : 'text-white/70 hover:bg-white/5 hover:text-church-gold group' }}">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors {{ request()->routeIs('admin.about.*') ? 'bg-church-dark/10 text-church-dark' : 'bg-white/5 group-hover:bg-church-gold/20 group-hover:text-church-gold' }}">
                    <i class="fas fa-info-circle"></i>
                </div>
                <span class="text-sm {{ request()->routeIs('admin.about.*') ? 'font-bold' : 'font-medium' }}">Tentang Gereja</span>
            </a>

            <!-- Master Data Section -->
            <div class="pt-4 pb-2">
                <p class="text-[10px] font-bold text-church-gold/60 uppercase tracking-widest px-2">Master Data</p>
            </div>

            <a href="{{ route('admin.liturgical_calendar.index') }}" class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.liturgical_calendar.*') ? 'bg-gradient-to-r from-church-gold to-yellow-600 text-church-dark shadow-[0_4px_20px_rgba(197,160,89,0.3)] transform hover:-translate-y-0.5' : 'text-white/70 hover:bg-white/5 hover:text-church-gold group' }}">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors {{ request()->routeIs('admin.liturgical_calendar.*') ? 'bg-church-dark/10 text-church-dark' : 'bg-white/5 group-hover:bg-church-gold/20 group-hover:text-church-gold' }}">
                    <i class="fas fa-calendar-week"></i>
                </div>
                <span class="text-sm {{ request()->routeIs('admin.liturgical_calendar.*') ? 'font-bold' : 'font-medium' }}">Kalender Liturgi</span>
            </a>

            <a href="{{ route('admin.region.index') }}" class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.region.*') ? 'bg-gradient-to-r from-church-gold to-yellow-600 text-church-dark shadow-[0_4px_20px_rgba(197,160,89,0.3)] transform hover:-translate-y-0.5' : 'text-white/70 hover:bg-white/5 hover:text-church-gold group' }}">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors {{ request()->routeIs('admin.region.*') ? 'bg-church-dark/10 text-church-dark' : 'bg-white/5 group-hover:bg-church-gold/20 group-hover:text-church-gold' }}">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <span class="text-sm {{ request()->routeIs('admin.region.*') ? 'font-bold' : 'font-medium' }}">Wilayah & Rayon</span>
            </a>
            
            <a href="{{ route('admin.commission.index') }}" class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.commission.*') ? 'bg-gradient-to-r from-church-gold to-yellow-600 text-church-dark shadow-[0_4px_20px_rgba(197,160,89,0.3)] transform hover:-translate-y-0.5' : 'text-white/70 hover:bg-white/5 hover:text-church-gold group' }}">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors {{ request()->routeIs('admin.commission.*') ? 'bg-church-dark/10 text-church-dark' : 'bg-white/5 group-hover:bg-church-gold/20 group-hover:text-church-gold' }}">
                    <i class="fas fa-users-cog"></i>
                </div>
                <span class="text-sm {{ request()->routeIs('admin.commission.*') ? 'font-bold' : 'font-medium' }}">Komisi</span>
            </a>

            <a href="{{ route('admin.steward.index') }}" class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.steward.*') ? 'bg-gradient-to-r from-church-gold to-yellow-600 text-church-dark shadow-[0_4px_20px_rgba(197,160,89,0.3)] transform hover:-translate-y-0.5' : 'text-white/70 hover:bg-white/5 hover:text-church-gold group' }}">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors {{ request()->routeIs('admin.steward.*') ? 'bg-church-dark/10 text-church-dark' : 'bg-white/5 group-hover:bg-church-gold/20 group-hover:text-church-gold' }}">
                    <i class="fas fa-pray"></i>
                </div>
                <span class="text-sm {{ request()->routeIs('admin.steward.*') ? 'font-bold' : 'font-medium' }}">Penatalayan</span>
            </a>
        </nav>
    </div>
    
    <div class="p-4 border-t border-white/10">
        <a href="{{ route('home.index') }}" target="_blank" class="flex items-center justify-center gap-2 w-full py-3 bg-white/5 hover:bg-white/10 rounded-xl text-white/80 transition-colors text-sm font-medium">
            <i class="fas fa-external-link-alt"></i> Lihat Website
        </a>
    </div>
</aside>