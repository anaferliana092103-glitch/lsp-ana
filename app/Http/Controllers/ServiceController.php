<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        // Data layanan diambil langsung dari database yang sama dengan dashboard admin.
        $services = Service::query()->orderBy('ordering')->latest('id')->get();

        return view('frontend.services.index', compact('services'));
    }

    public function show(Service $service): View
    {
        $otherServices = Service::query()
            ->whereKeyNot($service->id)
            ->orderBy('ordering')
            ->limit(3)
            ->get();

        return view('frontend.services.show', compact('service', 'otherServices'));
    }
}
