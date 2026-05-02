<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401 Unauthorized</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans text-church-dark flex items-center justify-center min-h-screen px-6">
    <div class="text-center max-w-md">
        <div class="text-4xl font-bold text-church-gold mb-4">
            401
        </div>
        <h1 class="text-2xl font-bold mb-2">
            Belum Login
        </h1>
        <p class="text-gray-500 text-sm mb-6">
            Anda harus login terlebih dahulu untuk mengakses halaman ini.
        </p>
        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 bg-church-gold hover:bg-yellow-600 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition">
            <i class="fas fa-sign-in-alt"></i> Login Sekarang
        </a>
    </div>
</body>
</html>