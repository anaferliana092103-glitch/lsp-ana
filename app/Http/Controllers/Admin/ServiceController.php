<?php

namespace App\Http\Controllers\Admin;

use App\Http\Concerns\HandlesImageUpload;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    use HandlesImageUpload;

    public function index(Request $request): View
    {
        $keyword = $request->query('q');

        $services = Service::query()
            ->when($keyword, function ($query, $keyword) {
                $query->where(fn ($q) => $q
                    ->where('name', 'like', "%{$keyword}%")
                    ->orWhere('short_description', 'like', "%{$keyword}%"));
            })
            ->orderBy('ordering')
            ->paginate(10)
            ->withQueryString();

        return view('admin.services.index', compact('services', 'keyword'));
    }

    public function create(): View
    {
        return view('admin.services.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        $data['image'] = $this->handleImageUpload($request, 'image', 'services');

        Service::create($data);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $data = $this->validated($request);

        $data['image'] = $this->handleImageUpload($request, 'image', 'services', $service->image);

        $service->update($data);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $this->removeImage($service->image);
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'icon' => ['nullable', 'string', 'max:50'],
            'image' => $this->imageRule(),
            'short_description' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'features' => ['nullable', 'string'],
            'is_featured' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'ordering' => ['nullable', 'integer', 'min:0', 'max:999'],
        ]) + [
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active', true),
            'ordering' => (int) $request->input('ordering', 0),
        ];
    }
}
