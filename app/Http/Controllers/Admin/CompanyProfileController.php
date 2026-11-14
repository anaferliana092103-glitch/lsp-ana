<?php

namespace App\Http\Controllers\Admin;

use App\Http\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyProfileController extends Controller
{
    use HandlesImageUpload;

    public function edit(): View
    {
        $profile = CompanyProfile::current();

        return view('admin.company-profile.edit', compact('profile'));
    }

    public function update(Request $request): RedirectResponse
    {
        $profile = CompanyProfile::current();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'tagline' => ['nullable', 'string', 'max:150'],
            'logo' => $this->imageRule(),
            'established_year' => ['nullable', 'string', 'max:10'],
            'description' => ['nullable', 'string'],
            'history' => ['nullable', 'string'],
            'vision' => ['nullable', 'string'],
            'mission' => ['nullable', 'string'],
            'commitment' => ['nullable', 'string'],
            'address' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'whatsapp' => ['nullable', 'string', 'max:40'],
            'email' => ['nullable', 'email', 'max:100'],
            'working_hours' => ['nullable', 'string', 'max:100'],
            'map_url' => ['nullable', 'url', 'max:255'],
            'experience_years' => ['nullable', 'integer', 'min:0', 'max:99'],
            'project_count' => ['nullable', 'integer', 'min:0', 'max:99999'],
            'client_count' => ['nullable', 'integer', 'min:0', 'max:99999'],
            'team_count' => ['nullable', 'integer', 'min:0', 'max:99999'],
            'facebook' => ['nullable', 'url', 'max:255'],
            'instagram' => ['nullable', 'url', 'max:255'],
            'youtube' => ['nullable', 'url', 'max:255'],
            'tiktok' => ['nullable', 'url', 'max:255'],
            'linkedin' => ['nullable', 'url', 'max:255'],
        ]);

        unset($data['logo']);

        $data['logo'] = $this->handleImageUpload($request, 'logo', 'logos', $profile->logo);

        $profile->update($data);

        return redirect()
            ->route('admin.company-profile.edit')
            ->with('success', 'Profil perusahaan berhasil diperbarui.');
    }
}
