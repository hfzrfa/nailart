@extends('layouts.admin')

@section('title', 'Add Testimonial | Admin')

@section('content')
    <h1 class="text-2xl font-semibold text-slate-900 mb-4">Add testimonial</h1>

    @if ($errors->any())
        <div class="mb-4 rounded-md bg-rose-50 border border-rose-200 text-rose-800 px-4 py-3 text-sm">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.testimonials.store') }}" method="POST" class="bg-white/80 rounded-xl border border-slate-200 shadow-sm p-6 max-w-2xl">
        @csrf

        <div class="space-y-4">
            <div>
                <label class="block text-xs font-medium text-slate-700 mb-1">Client name</label>
                <input type="text" name="client_name" value="{{ old('client_name') }}" required
                       class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-700 mb-1">Rating (1–5, optional)</label>
                <input type="number" name="rating" value="{{ old('rating') }}" min="1" max="5"
                       class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-700 mb-1">Message</label>
                <textarea name="message" rows="4" required
                          class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">{{ old('message') }}</textarea>
            </div>
        </div>

        <div class="mt-6 flex items-center gap-3">
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 rounded-full bg-[#a35151] text-white text-sm font-semibold hover:opacity-90 transition">
                Save testimonial
            </button>
            <a href="{{ route('admin.testimonials.index') }}" class="text-sm text-slate-600">Cancel</a>
        </div>
    </form>
@endsection
