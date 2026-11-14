<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Order;
use App\Models\Service;
use App\Models\WebsiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('frontend.contact', [
            'company' => CompanyProfile::current(),
            'settings' => WebsiteSetting::asArray(),
            'services' => Service::query()->orderBy('ordering')->get(),
        ]);
    }

    public function consultation(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'customer_name' => ['required', 'string', 'max:150'],
            'whatsapp' => ['required', 'string', 'max:40'],
            'service_id' => ['nullable', 'exists:services,id'],
            'address' => ['required', 'string', 'max:1000'],
            'notes' => ['required', 'string', 'max:2000'],
        ], [], [
            'customer_name' => 'nama lengkap',
            'whatsapp' => 'nomor WhatsApp',
            'service_id' => 'layanan CCTV',
            'address' => 'alamat',
            'notes' => 'isi kebutuhan',
        ]);

        $service = ! empty($data['service_id']) ? Service::find($data['service_id']) : null;
        $data['user_id'] = $request->user()?->id;
        $data['product_id'] = null;
        $data['quantity'] = 1;
        $data['status'] = 'Menunggu Konfirmasi';
        Order::create($data);

        $message = "Halo PT. Koneksi Net Nusantara, saya {$data['customer_name']} ingin berkonsultasi mengenai layanan CCTV.\n\nLayanan: " . ($service?->name ?? 'Belum menentukan') . "\nNomor WhatsApp: {$data['whatsapp']}\nAlamat: {$data['address']}\nKebutuhan: {$data['notes']}";
        $company = CompanyProfile::current();

        return redirect()->route('contact')->with([
            'success' => 'Permintaan konsultasi berhasil dikirim dan sudah tercatat. Silakan lanjutkan percakapan melalui WhatsApp.',
            'whatsapp_url' => wa_link($company->whatsapp ?? '', $message),
        ]);
    }
}
