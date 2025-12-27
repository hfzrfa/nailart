@extends('layouts.admin')

@section('title', 'Bookings | Admin')

@section('content')
    <h1 class="text-2xl font-semibold text-slate-900 mb-4">Bookings</h1>

    <div class="bg-white/80 rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50">
            <tr>
                <th class="px-4 py-2 text-left font-semibold text-slate-700">Customer</th>
                <th class="px-4 py-2 text-left font-semibold text-slate-700">Service</th>
                <th class="px-4 py-2 text-left font-semibold text-slate-700">Preferred time</th>
                <th class="px-4 py-2 text-left font-semibold text-slate-700">Status</th>
                <th class="px-4 py-2"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($bookings as $booking)
                <tr class="border-t border-slate-100">
                    <td class="px-4 py-2 align-top">
                        <div class="font-medium text-slate-900">{{ $booking->customer_name }}</div>
                        <div class="text-xs text-slate-500">{{ $booking->email }}</div>
                    </td>
                    <td class="px-4 py-2 align-top text-slate-700">
                        {{ $booking->service->name ?? '—' }}
                    </td>
                    <td class="px-4 py-2 align-top text-slate-700 whitespace-nowrap">
                        {{ $booking->preferred_date?->format('d M Y') }}<br>
                        <span class="text-xs text-slate-500">{{ $booking->preferred_time }}</span>
                    </td>
                    <td class="px-4 py-2 align-top">
                        @php
                            $colors = [
                                'pending' => 'bg-amber-50 text-amber-700 ring-amber-100',
                                'confirmed' => 'bg-emerald-50 text-emerald-700 ring-emerald-100',
                                'completed' => 'bg-slate-50 text-slate-700 ring-slate-100',
                                'cancelled' => 'bg-rose-50 text-rose-700 ring-rose-100',
                            ];
                            $label = ucfirst($booking->status ?? 'pending');
                            $color = $colors[$booking->status] ?? $colors['pending'];
                        @endphp
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ring-1 {{ $color }}">
                            {{ $label }}
                        </span>
                    </td>
                    <td class="px-4 py-2 align-top text-right whitespace-nowrap">
                        <a href="{{ route('admin.bookings.show', $booking) }}" class="text-xs text-[#a35151] font-medium mr-3">View</a>
                        <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" class="inline"
                              onsubmit="return confirm('Delete this booking?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-rose-600 font-medium">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-sm text-slate-500">No bookings yet.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
