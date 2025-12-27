<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    public function index()
    {
        $images = GalleryImage::orderByDesc('created_at')->get();

        return view('admin.gallery.index', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'image_path' => 'required|string|max:255',
        ]);

        $data['is_featured'] = $request->has('is_featured');

        GalleryImage::create($data);

        return redirect()->route('admin.gallery-images.index')->with('success', 'Image added to gallery.');
    }

    public function edit(GalleryImage $gallery_image)
    {
        return view('admin.gallery.edit', ['image' => $gallery_image]);
    }

    public function update(Request $request, GalleryImage $gallery_image)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'image_path' => 'required|string|max:255',
        ]);

        $data['is_featured'] = $request->has('is_featured');

        $gallery_image->update($data);

        return redirect()->route('admin.gallery-images.index')->with('success', 'Gallery image updated.');
    }

    public function destroy(GalleryImage $gallery_image)
    {
        $gallery_image->delete();

        return redirect()->route('admin.gallery-images.index')->with('success', 'Gallery image deleted.');
    }
}
