<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'message',
        'user_id',
        'platform_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function platforms(){
        return $this->belongsTo(Platform::class,'platform_id','id');
    }

}
