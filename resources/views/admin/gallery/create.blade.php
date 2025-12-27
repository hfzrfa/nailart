@extends('layouts.admin')

@section('title', 'Add Gallery Image | Admin')

@section('content')
    <h1 class="text-2xl font-semibold text-slate-900 mb-4">Add gallery image</h1>

    @if ($errors->any())
        <div class="mb-4 rounded-md bg-rose-50 border border-rose-200 text-rose-800 px-4 py-3 text-sm">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.gallery-images.store') }}" method="POST" class="bg-white/80 rounded-xl border border-slate-200 shadow-sm p-6 max-w-2xl">
        @csrf

        <div class="space-y-4">
            <div>
                <label class="block text-xs font-medium text-slate-700 mb-1">Title (optional)</label>
                <input type="text" name="title" value="{{ old('title') }}"
                       class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-700 mb-1">Image path / URL</label>
                <input type="text" name="image_path" value="{{ old('image_path') }}" required
                       class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
                <p class="mt-1 text-[11px] text-slate-500">Example: <code>storage/gallery/nail-01.jpg</code> or a full URL.</p>
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" id="is_featured" name="is_featured" class="rounded border-slate-300">
                <label for="is_featured" class="text-sm text-slate-700">Featured image</label>
            </div>
        </div>

        <div class="mt-6 flex items-center gap-3">
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 rounded-full bg-[#a35151] text-white text-sm font-semibold hover:opacity-90 transition">
                Save image
            </button>
            <a href="{{ route('admin.gallery-images.index') }}" class="text-sm text-slate-600">Cancel</a>
        </div>
    </form>
@endsection
