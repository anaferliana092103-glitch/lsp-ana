<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Payment extends Model {
 protected $fillable=['user_id','order_id','method','amount','proof','paid_at','status','admin_note'];
 protected $casts=['amount'=>'integer','paid_at'=>'datetime'];
 public function user(): BelongsTo { return $this->belongsTo(User::class); }
 public function order(): BelongsTo { return $this->belongsTo(Order::class); }
}
