<nav class="fixed top-0 left-0 right-0 bg-white/90 backdrop-blur-md z-50 border-b border-black/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <a href="{{ route('home.index') }}" class="flex items-center gap-3 cursor-pointer">
                <img src="{{ asset('logo.png') }}" alt="GKI Sudirman" class="w-10 h-10 rounded-full">
                <div class="flex flex-col">
                    <span class="text-lg font-serif font-bold leading-tight text-church-dark">GKI Sudirman</span>
                    <span class="text-[10px] uppercase tracking-widest opacity-60 text-church-dark">Bertumbuh Dalam Kasih</span>
                </div>
            </a>

            <div class="hidden lg:flex items-center gap-6">
                <template x-for="item in navItems" :key="item.id">
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        
                        <a x-show="!item.subItems" 
                            :href="item.url"
                            class="flex items-center gap-1 text-sm font-medium transition-colors py-2 cursor-pointer"
                            :class="currentRoute === item.id ? 'text-church-gold' : 'text-church-dark/60 hover:text-church-dark'"
                        >
                            <span x-text="item.label"></span>
                        </a>

                        <button x-show="item.subItems"
                            class="flex items-center gap-1 text-sm font-medium transition-colors py-2 cursor-pointer"
                            :class="currentRoute && currentRoute.startsWith(item.id) ? 'text-church-gold' : 'text-church-dark/60 hover:text-church-dark'"
                        >
                            <span x-text="item.label"></span>
                            <svg class="w-3 h-3 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        
                        <div x-show="item.subItems && open" 
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            class="absolute top-full left-0 mt-1 w-56 bg-white rounded-2xl shadow-xl border border-black/5 p-2">
                            <template x-for="sub in item.subItems" :key="sub.id">
                                <a :href="sub.url"
                                    class="block w-full text-left px-4 py-2.5 rounded-xl text-sm transition-colors hover:bg-church-warm/50 cursor-pointer"
                                    :class="currentRoute === sub.id ? 'bg-church-gold/10 text-church-gold' : 'text-church-dark/70'"
                                    x-text="sub.label">
                                </a>
                            </template>
                        </div>
                    </div>
                </template>
            </div>

            <button class="lg:hidden p-2" @click="mobileMenuOpen = !mobileMenuOpen">
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    </div>

    <div x-show="mobileMenuOpen" class="lg:hidden bg-white border-b border-black/5" x-transition x-cloak>
        <div class="px-4 py-6 flex flex-col gap-2">
            <template x-for="item in navItems" :key="item.id">
                <div>
                    <a x-show="!item.subItems" 
                        :href="item.url"
                        class="w-full flex items-center justify-between p-3 rounded-xl text-base font-medium"
                        :class="currentRoute === item.id ? 'bg-church-gold/10 text-church-gold' : 'text-church-dark/60'"
                    >
                        <span x-text="item.label"></span>
                    </a>

                    <button x-show="item.subItems"
                        @click="activeDropdown = activeDropdown === item.id ? null : item.id"
                        class="w-full flex items-center justify-between p-3 rounded-xl text-base font-medium"
                        :class="currentRoute && currentRoute.startsWith(item.id) ? 'bg-church-gold/10 text-church-gold' : 'text-church-dark/60'"
                    >
                        <span x-text="item.label"></span>
                        <svg class="w-4 h-4 transition-transform" :class="activeDropdown === item.id ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>

                    <div x-show="item.subItems && activeDropdown === item.id" class="ml-6 mt-1 flex flex-col gap-1 border-l-2 border-church-gold/20 pl-4">
                        <template x-for="sub in item.subItems" :key="sub.id">
                            <a :href="sub.url"
                                class="block w-full text-left py-2 text-sm"
                                :class="currentRoute === sub.id ? 'text-church-gold font-bold' : 'text-church-dark/50'"
                                x-text="sub.label">
                            </a>
                        </template>
                    </div>
                </div>
            </template>
        </div>
    </div>
</nav>