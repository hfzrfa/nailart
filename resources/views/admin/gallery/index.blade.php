@extends('layouts.admin')

@section('title', 'Gallery | Admin')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-slate-900">Gallery images</h1>
        <a href="{{ route('admin.gallery-images.create') }}"
           class="inline-flex items-center px-4 py-2 rounded-full bg-[#a35151] text-white text-sm font-medium hover:opacity-90 transition">
            + Add image
        </a>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($images as $image)
            <article class="bg-white/80 rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="aspect-[4/3] bg-slate-100 overflow-hidden">
                    <img src="{{ asset($image->image_path) }}" alt="{{ $image->title ?? 'Nail art' }}" class="w-full h-full object-cover">
                </div>
                <div class="p-4 flex-1 flex flex-col">
                    <div class="flex items-start justify-between mb-2">
                        <div>
                            <h2 class="text-sm font-semibold text-slate-900 truncate">{{ $image->title ?? 'Untitled image' }}</h2>
                            <p class="text-[11px] text-slate-500 break-all">{{ $image->image_path }}</p>
                        </div>
                        @if($image->is_featured)
                            <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-amber-50 text-amber-700">Featured</span>
                        @endif
                    </div>

                    <div class="mt-auto flex items-center justify-between pt-2">
                        <a href="{{ route('admin.gallery-images.edit', $image) }}" class="text-xs text-[#a35151] font-medium">Edit</a>
                        <form action="{{ route('admin.gallery-images.destroy', $image) }}" method="POST" class="inline"
                              onsubmit="return confirm('Delete this image?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-rose-600 font-medium">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
        @empty
            <p class="text-sm text-slate-500">No images yet. Use "Add image" to add gallery photos. You can store files under <code>storage/app/public</code> and use the URL from <code>php artisan storage:link</code>.</p>
        @endforelse
    </div>
@endsection
