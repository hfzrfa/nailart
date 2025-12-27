@extends('layouts.app')

@section('title', 'Nail Art Studio – Modern Nail Art & Design')

@section('content')
    <section class="bg-[#fff3f3]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16 grid lg:grid-cols-2 gap-10 items-center">
            <div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold leading-tight text-slate-900 mb-4">
                    Elegant, modern nail art
                    <span class="block text-[#a35151]">crafted just for you.</span>
                </h1>
                <p class="text-slate-700 text-sm sm:text-base mb-6 max-w-xl">
                    From minimalist manicures to bold statement designs, we create long‑lasting nails that match your style,
                    occasion, and personality.
                </p>
                <div class="flex flex-wrap gap-3 mb-2">
                    <a href="#booking"
                        class="inline-flex items-center justify-center px-5 py-2.5 rounded-full bg-[#a35151] text-white text-sm font-medium shadow-md hover:opacity-90 transition">
                        Book an appointment
                    </a>
                    <a href="#gallery"
                        class="inline-flex items-center justify-center px-5 py-2.5 rounded-full border border-[#a35151]/40 text-[#a35151] text-sm font-medium bg-white/70 backdrop-blur hover:bg-white transition">
                        View design gallery
                    </a>
                </div>
                <p class="text-xs text-slate-600">Open by appointment • Hygienic tools • Premium products</p>
            </div>
            <div class="relative">
                <div
                    class="aspect-[4/3] rounded-3xl bg-gradient-to-br from-[#ffe1e1] via-[#fff3f3] to-white shadow-xl flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/header.png') }}" alt="Nail art studio header" class="w-full h-full object-cover">
                </div>
                <div
                    class="absolute -bottom-4 -left-2 bg-white/90 backdrop-blur rounded-2xl px-4 py-2 shadow-md text-xs flex items-center gap-2 border border-[#a35151]/10">
                    <span class="inline-block h-7 w-7 rounded-full bg-[#a35151]/10 border border-[#a35151]/30"></span>
                    <div>
                        <p class="font-semibold text-slate-900">Custom nail design</p>
                        <p class="text-slate-600 text-[11px]">Tell us your idea – we’ll sketch it.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="py-10 lg:py-14">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-semibold text-slate-900 mb-1">Services</h2>
                    <p class="text-sm text-slate-600">Choose from our most popular nail art and care services.</p>
                </div>
                <div class="text-xs text-slate-500">All services use premium, long‑lasting products.</div>
            </div>

            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($services as $service)
                    <article
                        class="bg-white/80 backdrop-blur rounded-2xl border border-[#a35151]/10 shadow-sm p-4 flex flex-col justify-between">
                        <div>
                            <h3 class="font-semibold text-slate-900 mb-1">{{ $service->name }}</h3>
                            @if ($service->duration_minutes)
                                <p class="text-[11px] uppercase tracking-wide text-slate-500 mb-1">Approx.
                                    {{ $service->duration_minutes }} min</p>
                            @endif
                            @if ($service->description)
                                <p class="text-sm text-slate-600 line-clamp-3">{{ $service->description }}</p>
                            @endif
                        </div>
                        <div class="mt-4 flex items-center justify-between text-sm">
                            <span class="font-semibold text-[#a35151]">{{ number_format($service->price, 2) }}</span>
                            <a href="#booking" class="text-xs font-medium text-[#a35151] hover:underline">Book this</a>
                        </div>
                    </article>
                @empty
                    <p class="text-sm text-slate-600">Services will appear here once added from the admin panel.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="gallery" class="py-10 lg:py-14 bg:white/70 bg-white/70">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-semibold text-slate-900 mb-1">Gallery</h2>
                    <p class="text-sm text-slate-600">A glimpse of our recent nail art work.</p>
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
                @forelse ($galleryImages as $image)
                    <figure class="relative overflow-hidden rounded-2xl bg-slate-100 aspect-[3/4]">
                        <img src="{{ asset($image->image_path) }}" alt="{{ $image->title ?? 'Nail art design' }}"
                            class="w-full h-full object-cover" loading="lazy">
                        @if ($image->title)
                            <figcaption
                                class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/70 to-black/0 text-white text-xs px-2 py-2">
                                {{ $image->title }}
                            </figcaption>
                        @endif
                    </figure>
                @empty
                    <p class="text-sm text-slate-600">Add images in the admin panel to populate the gallery.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- <section id="testimonials" class="py-10 lg:py-14">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-semibold text-slate-900 mb-1">What clients say</h2>
                    <p class="text-sm text-slate-600">Real experiences from people who trust us with their nails.</p>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($testimonials as $testimonial)
                    <article
                        class="bg-white/80 backdrop-blur rounded-2xl border border-[#a35151]/10 shadow-sm p-4 flex flex-col h-full">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-semibold text-sm text-slate-900">{{ $testimonial->client_name }}</h3>
                            @if ($testimonial->rating)
                                <div class="text-xs text-amber-500">
                                    {{ str_repeat('★', $testimonial->rating) }}{{ str_repeat('☆', max(0, 5 - $testimonial->rating)) }}
                                </div>
                            @endif
                        </div>
                        <p class="text-sm text-slate-700 flex-1">“{{ $testimonial->message }}”</p>
                    </article>
                @empty
                    <p class="text-sm text-slate-600">Testimonials added in the admin panel will appear here.</p>
                @endforelse
            </div>
        </div>
    </section> --}}

    <section id="booking" class="py-10 lg:py-14 bg-white/70">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-10 items-start">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-semibold text-slate-900 mb-2">Book your session</h2>
                    <p class="text-sm text-slate-600 mb-4">Tell us what you’d like and when – we’ll confirm your
                        appointment by WhatsApp, phone, or email.</p>
                    <ul class="text-sm text-slate-700 space-y-1">
                        <li>• Hygienic tools and premium products</li>
                        <li>• Custom nail designs available</li>
                        <li>• Kindly arrive 5–10 minutes early</li>
                    </ul>
                </div>

                <div class="bg-[#fff3f3] border border-[#a35151]/20 rounded-2xl shadow-sm p-5">
                    @php
                        $isAdmin = auth()->check() && auth()->user()->email === 'admin@admin.com';
                    @endphp

                    @auth
                        @if ($isAdmin)
                            <h3 class="text-sm font-semibold text-slate-900 mb-3">Admin account</h3>
                            <p class="text-sm text-slate-700">
                                This is the public booking form for customers. As admin, you can manage all bookings from the
                                admin panel instead.
                            </p>
                        @else
                        <h3 class="text-sm font-semibold text-slate-900 mb-3">Booking form</h3>

                        @if (session('success'))
                            <div
                                class="mb-3 rounded-md bg-emerald-50 border border-emerald-200 text-emerald-800 px-3 py-2 text-xs">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mb-3 rounded-md bg-rose-50 border border-rose-200 text-rose-800 px-3 py-2 text-xs">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('booking.store') }}" class="space-y-3">
                            @csrf
                            <div class="grid sm:grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-medium text-slate-700 mb-1">Name</label>
                                    <input type="text" name="customer_name"
                                        value="{{ old('customer_name', auth()->user()->name) }}" required
                                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-slate-700 mb-1">Email</label>
                                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                                        required
                                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
                                </div>
                            </div>

                            <div class="grid sm:grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-medium text-slate-700 mb-1">Phone / WhatsApp</label>
                                    <input type="text" name="phone"
                                        value="{{ old('phone', optional(auth()->user())->phone) }}"
                                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-slate-700 mb-1">Preferred date</label>
                                    <input type="date" name="preferred_date" value="{{ old('preferred_date') }}" required
                                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
                                </div>
                            </div>

                            <div class="grid sm:grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-medium text-slate-700 mb-1">Preferred time</label>
                                    <input type="text" name="preferred_time" value="{{ old('preferred_time') }}"
                                        placeholder="e.g. 3:00 PM"
                                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-slate-700 mb-1">Service</label>
                                    <select name="service_id" required
                                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#a35151]/50">
                                        <option value="" disabled {{ old('service_id') ? '' : 'selected' }}>Select a
                                            service</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}" @selected(old('service_id') == $service->id)>
                                                {{ $service->name }} – {{ number_format($service->price, 2) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-medium text-slate-700 mb-1">Notes / design idea
                                    (optional)</label>
                                <textarea name="message" rows="3"
                                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#a35151]/50"
                                    placeholder="Tell us about the design, colors, or reference photos.">{{ old('message') }}</textarea>
                            </div>

                            <button type="submit"
                                class="w-full inline-flex items-center justify-center px-4 py-2.5 rounded-full bg-[#a35151] text-white text-sm font-semibold shadow-md hover:opacity-90 transition">
                                Send booking request
                            </button>
                            <p class="text-[11px] text-slate-500 text-center">
                                This is a request, not a final confirmation. We will contact you to confirm your time.
                            </p>
                        </form>
                        @endif
                    @else
                        <h3 class="text-sm font-semibold text-slate-900 mb-3">Login to book</h3>
                        <p class="text-sm text-slate-700 mb-4">
                            Please create an account or log in before sending a booking request.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <a href="{{ route('login') }}"
                                class="inline-flex items-center justify-center px-4 py-2.5 rounded-full bg-[#a35151] text-white text-sm font-semibold shadow-md hover:opacity-90 transition w-full sm:w-auto text-center">
                                Log in
                            </a>
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center justify-center px-4 py-2.5 rounded-full border border-[#a35151]/60 text-[#a35151] bg-white text-sm font-semibold hover:bg-[#fff3f3] transition w-full sm:w-auto text-center">
                                Create account
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </section>
@endsection
