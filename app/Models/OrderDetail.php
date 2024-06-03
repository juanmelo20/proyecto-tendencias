<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table='ordersdetails';
    protected $fillable=['product_id','order_id','quantity','subtotal','registeredby'];
    protected $guarded=['id','create_at','update_at'];
    public function product()
    {
      return $this->belongsTo(Product::class);
    }
    public function order()
{
  return $this->belongsTo(Order::class);
}
}
