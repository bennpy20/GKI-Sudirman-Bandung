<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-gray-50/50 font-sans text-church-dark flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">

    <!-- Mobile sidebar overlay -->
    <div x-cloak x-show="sidebarOpen" class="fixed inset-0 z-40 bg-church-dark/80 backdrop-blur-sm transition-opacity md:hidden" @click="sidebarOpen = false"></div>

    <!-- Sidebar -->
    @include('components.admin.navbar')

    <div class="flex-1 flex flex-col h-screen overflow-hidden bg-church-warm/30 relative">
        @include('components.admin.header')

        <main class="flex-1 overflow-x-hidden overflow-y-auto p-4 md:p-6 lg:p-8">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>
    </div>

@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonColor: '#d4af37',
                customClass: { 
                    popup: 'rounded-2xl', 
                    confirmButton: 'font-sans font-bold rounded-xl text-white px-6 py-2' 
                }
            });
        });
    </script>
@endif

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Hapus Data?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#a1a1aa',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal',
            customClass: {
                confirmButton: 'font-sans font-bold rounded-xl px-5 py-2.5',
                cancelButton: 'font-sans font-bold rounded-xl px-5 py-2.5',
                popup: 'rounded-2xl shadow-xl border border-gray-100'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>

</body>
</html>