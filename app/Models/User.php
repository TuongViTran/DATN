<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Nếu bảng là 'users' thì có thể không cần dòng này
    protected $table = 'users'; // hoặc 'user' nếu đúng DB bạn dùng

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Quan hệ 1-N: User có nhiều Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
?>
