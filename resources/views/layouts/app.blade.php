<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Nail Art Studio'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="min-h-screen flex flex-col bg-[#fff3f3] text-slate-900">
    <header class="bg-[#a35151] text-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <span class="text-xl font-semibold tracking-wide">Nail Art Studio</span>
            </a>
            <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
                <a href="#services" class="hover:opacity-80 transition">Services</a>
                <a href="#gallery" class="hover:opacity-80 transition">Gallery</a>
                <a href="#testimonials" class="hover:opacity-80 transition">Testimonials</a>
                <a href="#booking" class="hover:opacity-80 transition">Book Now</a>
            </nav>
            <div class="hidden md:flex items-center gap-4 text-sm">
                @auth
                    <span class="font-medium">Hi, {{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="px-3 py-1 rounded-full bg-white/10 hover:bg-white/20 transition text-xs font-semibold">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:opacity-80 transition">Login</a>
                    <a href="#booking"
                        class="px-3 py-1 rounded-full bg-white text-[#a35151] text-xs font-semibold hover:bg-rose-50 transition">
                        Book Now
                    </a>
                @endauth
            </div>
            <div class="md:hidden">
                {{-- Simple mobile menu trigger (no JS-heavy nav needed) --}}
            </div>
        </div>
    </header>

    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="bg-[#a35151] text-white mt-12">
        <div
            class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-sm">
            <p>&copy; {{ date('Y') }} Nail Art Studio. All rights reserved.</p>
            <p class="opacity-80">Beautiful, modern nail art for every occasion.</p>
        </div>
    </footer>
</body>

</html>
