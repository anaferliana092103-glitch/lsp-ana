<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::query()->orderBy('ordering')->latest()->get();
        return view('frontend.gallery', compact('galleries'));
    }
}
