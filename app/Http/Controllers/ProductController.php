<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $category = $request->query('kategori');

        if ($category && ! in_array($category, Product::CATEGORIES, true)) {
            $category = null;
        }

        // Tampilkan seluruh produk yang tersimpan agar data dari dashboard admin
        // langsung terlihat di website. Filter kategori tetap dipertahankan.
        $products = Product::query()
            ->when($category, fn ($query) => $query->where('category', $category))
            ->orderBy('ordering')
            ->paginate(9)
            ->withQueryString();

        $categories = Product::CATEGORIES;
        $categoryCounts = Product::active()
            ->selectRaw('category, COUNT(*) as total')
            ->groupBy('category')
            ->pluck('total', 'category');

        return view('frontend.products.index', compact('products', 'categories', 'category', 'categoryCounts'));
    }
}
