@extends('layouts.admin')

@section('title', 'Testimonials | Admin')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-slate-900">Testimonials</h1>
        <a href="{{ route('admin.testimonials.create') }}"
           class="inline-flex items-center px-4 py-2 rounded-full bg-[#a35151] text-white text-sm font-medium hover:opacity-90 transition">
            + Add testimonial
        </a>
    </div>

    <div class="bg-white/80 rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50">
            <tr>
                <th class="px-4 py-2 text-left font-semibold text-slate-700">Client</th>
                <th class="px-4 py-2 text-left font-semibold text-slate-700">Rating</th>
                <th class="px-4 py-2 text-left font-semibold text-slate-700">Message</th>
                <th class="px-4 py-2"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($testimonials as $testimonial)
                <tr class="border-t border-slate-100">
                    <td class="px-4 py-2 align-top">
                        <div class="font-medium text-slate-900">{{ $testimonial->client_name }}</div>
                    </td>
                    <td class="px-4 py-2 align-top">
                        @if($testimonial->rating)
                            <span class="text-xs text-amber-500">
                                {{ str_repeat('★', $testimonial->rating) }}{{ str_repeat('☆', max(0, 5 - $testimonial->rating)) }}
                            </span>
                        @else
                            <span class="text-xs text-slate-500">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 align-top text-slate-700 max-w-md">
                        {{ $testimonial->message }}
                    </td>
                    <td class="px-4 py-2 align-top text-right whitespace-nowrap">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-xs text-[#a35151] font-medium mr-3">Edit</a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline"
                              onsubmit="return confirm('Delete this testimonial?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-rose-600 font-medium">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-sm text-slate-500">No testimonials yet. Use "Add testimonial" to add one.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
