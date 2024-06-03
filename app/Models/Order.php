<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'customer_id',
        'date_of_sale',
        'total_payment',
        'status',
        'registeredby',
        'route'
    ];

    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function orderdetail()
    {
      return $this->hasMany(OrderDetail::class);
    }
    
}
