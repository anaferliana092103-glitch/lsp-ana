<?php

namespace App\Http\Concerns;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait HandlesImageUpload
{
    protected function storeImage(UploadedFile $file, string $directory): string
    {
        return $file->store($directory, 'public');
    }

    protected function removeImage(?string $path): void
    {
        if (! $path) {
            return;
        }

        if (Str::startsWith($path, ['http://', 'https://', '//', 'images/'])) {
            return;
        }

        Storage::disk('public')->delete($path);
    }

    protected function handleImageUpload(
        \Illuminate\Http\Request $request,
        string $field,
        string $directory,
        ?string $current = null,
        bool $required = false,
    ): ?string {
        if (! $request->hasFile($field)) {
            return $current;
        }

        $file = $request->file($field);

        if ($file->isValid()) {
            $this->removeImage($current);

            return $this->storeImage($file, $directory);
        }

        if ($required) {
            return null;
        }

        return $current;
    }

    /**
     * @return array<int, string>
     */
    protected function imageRule(bool $required = false, int $maxKb = 3072): array
    {
        $rules = ['file', 'image:allow_svg', 'mimes:jpeg,png,jpg,gif,webp,svg', 'max:'.$maxKb];

        return $required ? ['required', ...$rules] : ['nullable', ...$rules];
    }
}
