<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'cat_ust',
    ];

    public function underCategory()
    {
        return $this->hasMany(Category::class,'cat_ust','id');
    }

    public function allundercategory()
    {
        return $this->underCategory()->with('allundercategory');
    }

    public function platforms(){
        return $this->hasMany(Platform::class);
    }

    protected static function booted()
    {
        static::deleting(function ($category) {
            $category->platforms->each->delete();
        });
    }
}
