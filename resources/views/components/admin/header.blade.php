<header class="h-16 bg-white/80 backdrop-blur-md shadow-sm flex items-center justify-between px-4 lg:px-8 z-10 border-b border-gray-200/60 sticky top-0">
    <div class="flex items-center gap-4">
        <button @click="sidebarOpen = true" class="md:hidden text-gray-500 hover:text-church-gold focus:outline-none p-1.5 rounded-lg hover:bg-church-warm/50 transition-colors">
            <i class="fas fa-bars text-lg"></i>
        </button>
        <div class="hidden md:block">
            <h2 class="text-lg font-serif font-bold text-church-dark">@yield('page_title', 'Admin Panel')</h2>
        </div>
    </div>
    
    <div class="flex items-center space-x-4">
        <button class="text-gray-400 hover:text-church-gold transition-colors relative mt-1">
            <i class="fas fa-bell"></i>
            <span class="absolute -top-1 -right-1 flex h-2.5 w-2.5">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-red-500"></span>
            </span>
        </button>
        
        <div class="h-6 w-px bg-gray-200"></div>
        
        <div class="relative" x-data="{ profileOpen: false }">
            <div @click="profileOpen = !profileOpen" @click.away="profileOpen = false" class="flex items-center gap-2.5 cursor-pointer hover:opacity-80 transition-opacity">
                <div class="hidden md:block text-right">
                    <p class="text-[13px] font-bold text-church-dark leading-tight">Admin Sekretaris</p>
                    <p class="text-[11px] text-church-gold font-medium">Administrator</p>
                </div>
                <div class="h-9 w-9 rounded-xl bg-gradient-to-br from-church-gold to-yellow-600 shadow-sm flex items-center justify-center text-church-dark font-bold text-base border border-yellow-200">
                    A
                </div>
                <i class="fas fa-chevron-down text-[10px] text-gray-400 ml-0.5"></i>
            </div>

            <!-- Dropdown Menu -->
            <div x-show="profileOpen" 
                x-transition:enter="transition ease-out duration-100" 
                x-transition:enter-start="transform opacity-0 scale-95" 
                x-transition:enter-end="transform opacity-100 scale-100" 
                x-transition:leave="transition ease-in duration-75" 
                x-transition:leave-start="transform opacity-100 scale-100" 
                x-transition:leave-end="transform opacity-0 scale-95" 
                class="absolute right-0 mt-3 w-48 bg-white rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.1)] border border-gray-100 py-2 z-50 text-sm" style="display: none;">
                
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-church-warm/30 hover:text-church-gold font-bold transition-colors">
                    <i class="fas fa-user-circle w-5 text-center mr-1 text-gray-400"></i> Profil Akun
                </a>
                
                <div class="border-t border-gray-50 my-1"></div>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="cursor-pointer w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 font-bold transition-colors">
                        <i class="fas fa-sign-out-alt w-5 text-center mr-1 text-red-400"></i> Logout Akun
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>