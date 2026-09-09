<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('sort_order')->orderBy('id')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'role'       => ['nullable', 'string', 'max:255'],
            'message'    => ['required', 'string'],
            'image'      => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'rating'     => ['required', 'integer', 'min:1', 'max:5'],
            'is_active'  => ['boolean'],
            'sort_order' => ['integer'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request->file('image'));
        }

        $data['is_active']  = $request->boolean('is_active', true);
        $data['sort_order'] = $request->integer('sort_order', 0);

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'role'       => ['nullable', 'string', 'max:255'],
            'message'    => ['required', 'string'],
            'image'      => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'rating'     => ['required', 'integer', 'min:1', 'max:5'],
            'is_active'  => ['boolean'],
            'sort_order' => ['integer'],
        ]);

        if ($request->hasFile('image')) {
            $this->deleteImage($testimonial->image);
            $data['image'] = $this->storeImage($request->file('image'));
        }

        $data['is_active']  = $request->boolean('is_active', true);
        $data['sort_order'] = $request->integer('sort_order', 0);

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $this->deleteImage($testimonial->image);
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted.');
    }

    // -------------------------------------------------------------------------

    private function storeImage($file): string
    {
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

        // 1. Public disk  →  storage/app/public/testimonials/
        Storage::disk('public')->putFileAs('testimonials', $file, $filename);

        // 2. Storage root →  storage/testimonials/
        $destDir = storage_path('testimonials');
        if (! is_dir($destDir)) {
            mkdir($destDir, 0755, true);
        }
        copy(storage_path('app/public/testimonials/' . $filename), $destDir . DIRECTORY_SEPARATOR . $filename);

        // DB stores canonical path (no prefix)
        return 'testimonials/' . $filename;
    }

    private function deleteImage(?string $image): void
    {
        if (! $image) return;

        Storage::disk('public')->delete($image);

        $storageRootFile = storage_path($image);
        if (file_exists($storageRootFile)) {
            unlink($storageRootFile);
        }
    }
}
