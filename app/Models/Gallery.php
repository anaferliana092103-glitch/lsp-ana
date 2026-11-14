<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['title', 'category', 'image', 'description', 'ordering'];

    protected function casts(): array
    {
        return [
            'ordering' => 'integer',
        ];
    }
}
