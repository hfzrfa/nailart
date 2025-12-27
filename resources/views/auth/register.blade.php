@extends('layouts.app')

@section('title', 'Sign Up – Nail Art Studio')

@section('content')
    <section class="py-12 lg:py-16">
        <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white/90 border border-[#a35151]/20 rounded-2xl shadow-sm p-6">
                <h1 class="text-xl font-semibold text-slate-900 mb-1">Create your account</h1>
                <p class="text-sm text-slate-600 mb-6">Sign up to book appointments and track your bookings.</p>

                @if ($errors->any())
                    <div class="mb-4 rounded-md bg-rose-50 border border-rose-200 text-rose-800 px-3 py-2 text-xs">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-xs font-medium text-slate-700 mb-1">Full name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus
                               class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-700 mb-1">Phone number</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" required
                               class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-700 mb-1">Password</label>
                        <input type="password" name="password" required minlength="8"
                               class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-700 mb-1">Confirm password</label>
                        <input type="password" name="password_confirmation" required minlength="8"
                               class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
                    </div>

                    <button type="submit"
                            class="w-full inline-flex items-center justify-center px-4 py-2.5 rounded-full bg-[#a35151] text-white text-sm font-semibold shadow-md hover:opacity-90 transition">
                        Sign up
                    </button>
                </form>

                <p class="mt-4 text-xs text-center text-slate-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-[#a35151] font-medium hover:underline">Log in</a>
                </p>
            </div>
        </div>
    </section>
@endsection
