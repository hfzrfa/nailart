@extends('layouts.admin')

@section('title', 'Admin Login | Nail Art Studio')

@section('content')
    <div class="min-h-[60vh] flex items-center justify-center">
        <div class="w-full max-w-md bg-white/80 backdrop-blur rounded-xl shadow-lg p-8">
            <h1 class="text-2xl font-semibold text-center text-[#a35151] mb-6">Admin Login</h1>

            @if ($errors->any())
                <div class="mb-4 rounded-md bg-rose-50 border border-rose-200 text-rose-800 px-4 py-3 text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium mb-1" for="email">Admin Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm focus:border-[#a35151] focus:ring-1 focus:ring-[#a35151] outline-none bg-white" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1" for="password">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm focus:border-[#a35151] focus:ring-1 focus:ring-[#a35151] outline-none bg-white" />
                </div>

                <button type="submit"
                    class="w-full mt-4 inline-flex justify-center rounded-md bg-[#a35151] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#8d3f3f] transition">
                    Masuk sebagai Admin
                </button>

                <p class="mt-4 text-xs text-center text-slate-500">
                    Akun admin hanya untuk pemilik / pengelola studio.<br>
                    Email default: <span class="font-mono">admin@admin.com</span>
                </p>
            </form>
        </div>
    </div>
@endsection
