@extends('layouts.admin')

@section('title', 'Services | Admin')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-slate-900">Services</h1>
        <a href="{{ route('admin.services.create') }}"
           class="inline-flex items-center px-4 py-2 rounded-full bg-[#a35151] text-white text-sm font-medium hover:opacity-90 transition">
            + Add service
        </a>
    </div>

    <div class="bg-white/80 rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50">
            <tr>
                <th class="px-4 py-2 text-left font-semibold text-slate-700">Name</th>
                <th class="px-4 py-2 text-left font-semibold text-slate-700">Price</th>
                <th class="px-4 py-2 text-left font-semibold text-slate-700">Duration</th>
                <th class="px-4 py-2 text-left font-semibold text-slate-700">Active</th>
                <th class="px-4 py-2"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($services as $service)
                <tr class="border-t border-slate-100">
                    <td class="px-4 py-2 align-top">
                        <div class="font-medium text-slate-900">{{ $service->name }}</div>
                        @if($service->description)
                            <div class="text-xs text-slate-500 line-clamp-2">{{ $service->description }}</div>
                        @endif
                    </td>
                    <td class="px-4 py-2 align-top text-slate-800">{{ number_format($service->price, 2) }}</td>
                    <td class="px-4 py-2 align-top text-slate-800">
                        {{ $service->duration_minutes ? $service->duration_minutes.' min' : '-' }}
                    </td>
                    <td class="px-4 py-2 align-top">
                        @if($service->is_active)
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700">Active</span>
                        @else
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-slate-100 text-slate-600">Hidden</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 align-top text-right whitespace-nowrap">
                        <a href="{{ route('admin.services.edit', $service) }}" class="text-xs text-[#a35151] font-medium mr-3">Edit</a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline"
                              onsubmit="return confirm('Delete this service?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-rose-600 font-medium">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-sm text-slate-500">No services yet. Click "Add service" to create one.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
