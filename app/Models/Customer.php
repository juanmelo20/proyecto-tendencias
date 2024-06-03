<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
use HasFactory;
    protected $table='customers';
    protected $fillable=['name','identification_document','address','phone','email','status','registeredby','image'];
    protected $guarded=['id','create_at','update_at','status','registeredby'];

  public function orders()
  {
    return $this->hasMany(Order::class);
  }
}
