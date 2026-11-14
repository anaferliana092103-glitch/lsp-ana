<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function create(Request $request): View
    {
        $product = $request->filled('product') ? Product::query()->findOrFail($request->integer('product')) : null;
        $service = $request->filled('service') ? Service::query()->findOrFail($request->integer('service')) : null;
        abort_if(! $product && ! $service, 404);
        return view('orders.create', compact('product', 'service'));
    }

    public function subscribe(Request $request): View
    {
        $product = $request->filled('product') ? Product::query()->findOrFail($request->integer('product')) : null;
        $service = $request->filled('service') ? Service::query()->findOrFail($request->integer('service')) : null;
        $products = Product::query()->orderBy('ordering')->get();
        $services = Service::query()->orderBy('ordering')->get();
        return view('orders.subscribe', compact('product', 'service', 'products', 'services'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'product_id' => ['nullable', 'exists:products,id'],
            'service_id' => ['nullable', 'exists:services,id'],
            'customer_name' => ['required', 'string', 'max:150'],
            'whatsapp' => ['required', 'string', 'max:40'],
            'address' => ['required', 'string', 'max:1000'],
            'quantity' => ['required', 'integer', 'min:1', 'max:999'],
            'subscription_package' => ['nullable', 'string', 'max:100'],
            'subscription_duration' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);
        $hasProduct = ! empty($data['product_id']);
        $hasService = ! empty($data['service_id']);

        if (! $hasProduct && ! $hasService) {
            return back()
                ->withErrors(['product_id' => 'Silakan pilih produk atau layanan terlebih dahulu.'])
                ->withInput();
        }

        if ($hasProduct && $hasService) {
            return back()
                ->withErrors(['product_id' => 'Pilih salah satu saja, produk atau layanan.'])
                ->withInput();
        }
        $data['user_id'] = $request->user()->id;
        $data['customer_name'] = $request->user()->name;
        $data['status'] = 'Menunggu Konfirmasi';
        DB::transaction(fn () => Order::create($data));
        return redirect()->route('orders.index')->with('success', 'Pengajuan berlangganan berhasil dikirim.');
    }

    public function index(Request $request): View
    {
        $orders = $request->user()->orders()->with(['product', 'service', 'payments' => fn ($query) => $query->latest()])->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }
}
