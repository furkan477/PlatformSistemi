<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'subject',
        'description',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class,'platform_id','id');
    }

    protected static function booted()
    {
        static::deleting(function ($platform) {
            $platform->comments->each->delete();
        });
    }
}
