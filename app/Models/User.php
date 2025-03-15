<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'phone',
        'avatar_url',
        'account_type',
    ];

    // Ẩn mật khẩu khi lấy dữ liệu
    protected $hidden = [
        'password',
    ];

    // Nếu bạn có quan hệ với bài viết
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Phương thức để lấy URL của ảnh đại diện
    public function getAvatarUrlAttribute()
    {
        return $this->attributes['avatar_url'] ? asset('storage/' . $this->attributes['avatar_url']) : asset('default-avatar.png');
    }
    
}