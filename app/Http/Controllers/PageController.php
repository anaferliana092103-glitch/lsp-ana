<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\WebsiteSetting;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('frontend.about');
    }

    public function contact(): View
    {
        $company = CompanyProfile::current();
        $settings = WebsiteSetting::asArray();

        return view('frontend.contact', compact('company', 'settings'));
    }
}
