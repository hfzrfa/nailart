<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\GalleryImage;
use App\Models\Booking;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->orderBy('name')->get();
        $galleryImages = GalleryImage::orderByDesc('is_featured')->orderByDesc('created_at')->limit(12)->get();

        return view('welcome', [
            'services' => $services,
            'galleryImages' => $galleryImages,
        ]);
    }

    public function storeBooking(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'service_id' => 'required|exists:services,id',
            'preferred_date' => 'required|date|after_or_equal:today',
            'preferred_time' => 'nullable|string|max:50',
            'message' => 'nullable|string|max:2000',
        ]);

        $data['status'] = 'pending';

        Booking::create($data);

        return redirect()->route('home')->with('success', 'Your booking request has been sent. We will contact you soon.');
    }
}
