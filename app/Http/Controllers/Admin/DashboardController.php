<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\GalleryImage;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'servicesCount' => Service::count(),
            'galleryCount' => GalleryImage::count(),
            'pendingBookingsCount' => Booking::where('status', 'pending')->count(),
        ]);
    }
}
