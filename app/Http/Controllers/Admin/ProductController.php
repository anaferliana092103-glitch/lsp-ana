<?php

namespace App\Http\Controllers\Admin;

use App\Http\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    use HandlesImageUpload;

    public function index(Request $request): View
    {
        $keyword = $request->query('q');
        $category = $request->query('kategori');

        $products = Product::query()
            ->with('productCategory')
            ->when($category, fn ($query) => $query->where('category', $category))
            ->when($keyword, function ($query, $keyword) {
                $query->where(fn ($q) => $q
                    ->where('name', 'like', "%{$keyword}%")
                    ->orWhere('brand', 'like', "%{$keyword}%"));
            })
            ->orderBy('ordering')
            ->paginate(10)
            ->withQueryString();

        return view('admin.products.index', compact('products', 'keyword', 'category'));
    }

    public function create(): View
    {
        $categories = ProductCategory::active()->orderBy('ordering')->orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        $data['image'] = $this->handleImageUpload($request, 'image', 'products');

        Product::create($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product): View
    {
        $categories = ProductCategory::active()->orderBy('ordering')->orderBy('name')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $data = $this->validated($request);

        $data['image'] = $this->handleImageUpload($request, 'image', 'products', $product->image);

        $product->update($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $this->removeImage($product->image);
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        $data = $request->validate([
            'product_category_id' => ['nullable', 'exists:product_categories,id'],
            'name' => ['required', 'string', 'max:150'],
            'brand' => ['nullable', 'string', 'max:100'],
            'category' => ['nullable', 'string', 'max:60'],
            'image' => $this->imageRule(),
            'description' => ['nullable', 'string'],
            'specifications' => ['nullable', 'string'],
            'price' => ['nullable', 'string', 'max:60'],
            'is_featured' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'ordering' => ['nullable', 'integer', 'min:0', 'max:999'],
        ]);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active', true);
        $data['ordering'] = (int) $request->input('ordering', 0);

        return $data;
    }
}
