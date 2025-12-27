@extends('layouts.admin')

@section('title', 'Edit Service | Admin')

@section('content')
    <h1 class="text-2xl font-semibold text-slate-900 mb-4">Edit service</h1>

    @if ($errors->any())
        <div class="mb-4 rounded-md bg-rose-50 border border-rose-200 text-rose-800 px-4 py-3 text-sm">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.services.update', $service) }}" method="POST" class="bg-white/80 rounded-xl border border-slate-200 shadow-sm p-6 max-w-2xl">
        @csrf
        @method('PUT')

        <div class="space-y-4">
            <div>
                <label class="block text-xs font-medium text-slate-700 mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $service->name) }}" required
                       class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-700 mb-1">Description</label>
                <textarea name="description" rows="3"
                          class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">{{ old('description', $service->description) }}</textarea>
            </div>

            <div class="grid sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1">Duration (minutes)</label>
                    <input type="number" name="duration_minutes" value="{{ old('duration_minutes', $service->duration_minutes) }}" min="0"
                           class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1">Price</label>
                    <input type="number" name="price" value="{{ old('price', $service->price) }}" min="0" step="0.01" required
                           class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1">Sort order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}" min="0"
                           class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
                </div>
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" id="is_active" name="is_active" class="rounded border-slate-300" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                <label for="is_active" class="text-sm text-slate-700">Active</label>
            </div>
        </div>

        <div class="mt-6 flex items-center gap-3">
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 rounded-full bg-[#a35151] text-white text-sm font-semibold hover:opacity-90 transition">
                Update service
            </button>
            <a href="{{ route('admin.services.index') }}" class="text-sm text-slate-600">Cancel</a>
        </div>
    </form>
@endsection
