@extends('components.layout')

@section('title')
    GKI Sudirman
@endsection

@section('content')
<div x-show="!selectedDevotional && !selectedArticle">
    <div x-show="currentRoute === 'hubungi_kami.index'">
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
                        <p class="text-sm text-church-dark/60">Jl. Jenderal Sudirman No. 638, Bandung 40183</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-church-gold/10 rounded-2xl text-church-gold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold mb-1">Telepon</h4>
                        <p class="text-sm text-church-dark/60">(022) 6002374</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-church-gold/10 rounded-2xl text-church-gold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold mb-1">Email</h4>
                        <p class="text-sm text-church-dark/60">gkisudirman@yahoo.com</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-church-gold/10 rounded-2xl text-church-gold">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a2.94 2.94 0 00-2.066-2.08C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.432.606A2.94 2.94 0 00.502 6.186 30.36 30.36 0 000 12a30.36 30.36 0 00.502 5.814 2.94 2.94 0 002.066 2.08C4.5 20.5 12 20.5 12 20.5s7.5 0 9.432-.606a2.94 2.94 0 002.066-2.08A30.36 30.36 0 0024 12a30.36 30.36 0 00-.502-5.814zM9.75 15.5v-7l6 3.5-6 3.5z"/>
                        </svg>
                    </div>
                    <div>
                        <a href="https://youtube.com/@gkisudirmanbandungofficial" target="_blank" class="hover:text-church-gold">
                            <h4 class="font-bold mb-1">YouTube</h4>
                            <p class="text-sm text-church-dark/60">GKI Sudirman Bandung Official</p>
                        </a>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-church-gold/10 rounded-2xl text-church-gold">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7.75 2C4.574 2 2 4.574 2 7.75v8.5C2 19.426 4.574 22 7.75 22h8.5C19.426 22 22 19.426 22 16.25v-8.5C22 4.574 19.426 2 16.25 2h-8.5zm0 2h8.5A3.75 3.75 0 0120 7.75v8.5A3.75 3.75 0 0116.25 20h-8.5A3.75 3.75 0 014 16.25v-8.5A3.75 3.75 0 017.75 4zm8.75 1.5a1 1 0 100 2 1 1 0 000-2zM12 7a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6z"/>
                        </svg>
                    </div>
                    <div>
                        <a href="https://www.instagram.com/gkisudirman638" target="_blank" class="hover:text-church-gold">
                            <h4 class="font-bold mb-1">Instagram</h4>
                            <p class="text-sm text-church-dark/60">GKI Sudirman Bandung</p>
                        </a>
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
@endsection