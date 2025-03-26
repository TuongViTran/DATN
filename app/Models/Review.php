<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';

    protected $fillable = ['user_id', 'shop_id', 'content', 'rating', 'likes_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coffeeShop()
    {
        return $this->belongsTo(CoffeeShop::class, 'shop_id');
    }
}
