<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['coffee_shop_id', 'street'];

    public function coffeeShop()
    {
        return $this->belongsTo(CoffeeShop::class);
    }
}
?>