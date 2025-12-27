@extends('layouts.admin')

@section('title', 'Dashboard | Nail Art Studio')

@section('content')
    <h1 class="text-2xl font-semibold text-slate-900 mb-6">Dashboard</h1>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <div class="bg-white/80 rounded-xl border border-[#a35151]/10 shadow-sm p-4">
            <p class="text-xs text-slate-500 mb-1">Services</p>
            <p class="text-2xl font-semibold text-slate-900">{{ $servicesCount }}</p>
        </div>
        <div class="bg-white/80 rounded-xl border border-[#a35151]/10 shadow-sm p-4">
            <p class="text-xs text-slate-500 mb-1">Gallery images</p>
            <p class="text-2xl font-semibold text-slate-900">{{ $galleryCount }}</p>
        </div>
        <div class="bg-white/80 rounded-xl border border-[#a35151]/10 shadow-sm p-4">
            <p class="text-xs text-slate-500 mb-1">Pending bookings</p>
            <p class="text-2xl font-semibold text-slate-900">{{ $pendingBookingsCount }}</p>
        </div>
    </div>
@endsection
