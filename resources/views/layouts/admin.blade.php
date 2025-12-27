<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin | Nail Art Studio')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-[#fff3f3] text-slate-900">
    <header class="bg-[#a35151] text-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-14">
            <div class="font-semibold tracking-wide">Admin Panel</div>
            <nav class="flex items-center gap-4 text-sm font-medium">
                <a href="{{ route('admin.dashboard') }}" class="hover:opacity-80 transition">Dashboard</a>
                <a href="{{ route('admin.services.index') }}" class="hover:opacity-80 transition">Services</a>
                <a href="{{ route('admin.gallery-images.index') }}" class="hover:opacity-80 transition">Gallery</a>
                <a href="{{ route('admin.bookings.index') }}" class="hover:opacity-80 transition">Bookings</a>
            </nav>
        </div>
    </header>

    <main class="flex-1 py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 rounded-md bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="bg-[#a35151] text-white mt-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-sm text-center">
            Admin • Nail Art Studio
        </div>
    </footer>
</body>

</html>
