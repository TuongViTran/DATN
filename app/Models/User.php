<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Dùng Authenticatable thay vì Model
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'account_type',
        'role',
        'phone',
        'avatar_url', // Thêm trường avatar_url vào đây
        'gender',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getAvatarUrlAttribute()
    {
        return $this->attributes['avatar_url'] 
            ? asset('storage/' . $this->attributes['avatar_url']) 
            : asset('default-avatar.png');
    }
}
