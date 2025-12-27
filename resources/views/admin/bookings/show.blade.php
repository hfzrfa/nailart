@extends('layouts.admin')

@section('title', 'Booking Details | Admin')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-semibold text-slate-900">Booking details</h1>
        <a href="{{ route('admin.bookings.index') }}" class="text-sm text-slate-600">← Back to bookings</a>
    </div>

    <div class="grid gap-6 md:grid-cols-3">
        <div class="md:col-span-2 bg-white/80 rounded-xl border border-slate-200 shadow-sm p-6 space-y-4">
            <div>
                <h2 class="text-sm font-semibold text-slate-800 mb-1">Customer</h2>
                <p class="text-sm text-slate-900">{{ $booking->customer_name }}</p>
                <p class="text-xs text-slate-500">{{ $booking->email }} @if($booking->phone) · {{ $booking->phone }} @endif</p>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-slate-800 mb-1">Service</h2>
                <p class="text-sm text-slate-900">{{ $booking->service->name ?? '—' }}</p>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-slate-800 mb-1">Preferred time</h2>
                <p class="text-sm text-slate-900">
                    {{ $booking->preferred_date?->format('d M Y') }} at {{ $booking->preferred_time }}
                </p>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-slate-800 mb-1">Message</h2>
                <p class="text-sm text-slate-700 whitespace-pre-line">{{ $booking->message ?: '—' }}</p>
            </div>
        </div>

        <div class="bg-white/80 rounded-xl border border-slate-200 shadow-sm p-6 space-y-4">
            <div>
                <h2 class="text-sm font-semibold text-slate-800 mb-2">Status</h2>
                <form action="{{ route('admin.bookings.update', $booking) }}" method="POST" class="space-y-3">
                    @csrf
                    @method('PATCH')

                    <select name="status" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
                        @foreach(['pending', 'confirmed', 'completed', 'cancelled'] as $status)
                            <option value="{{ $status }}" @selected($booking->status === $status)>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>

                    <button type="submit"
                            class="w-full inline-flex justify-center items-center px-4 py-2 rounded-full bg-[#a35151] text-white text-sm font-semibold hover:opacity-90 transition">
                        Update status
                    </button>
                </form>
            </div>

            <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST"
                  onsubmit="return confirm('Delete this booking?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="w-full inline-flex justify-center items-center px-4 py-2 rounded-full bg-rose-50 text-rose-700 text-xs font-semibold border border-rose-100 hover:bg-rose-100 transition">
                    Delete booking
                </button>
            </form>
        </div>
    </div>
@endsection
