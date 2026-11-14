<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'service_id', 'customer_name', 'whatsapp',
        'address', 'quantity', 'subscription_package', 'subscription_duration', 'notes', 'status',
    ];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function product(): BelongsTo { return $this->belongsTo(Product::class); }
    public function service(): BelongsTo { return $this->belongsTo(Service::class); }
    public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany { return $this->hasMany(Payment::class); }
}
