<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // Gunakan tabel layanan yang sama dengan halaman /layanan.
        // Layanan terbaru tetap tampil di beranda meskipun belum ditandai unggulan.
        $services = Service::query()->orderBy('ordering')->get();
        $featuredServices = $services->take(4);
        $products = Product::query()->orderBy('ordering')->limit(8)->get();
        $testimonials = [];

        return view('frontend.home', compact(
            'services',
            'featuredServices',
            'products',
            'testimonials'
        ));
    }
}
