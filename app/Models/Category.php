<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 

    protected $fillable = [
        'name', 'slug', 'image', 'status'
    ];
    
    // public function books()
    // {
    //     return $this->belongsToMany('App\Models\Book', 'book_category', 'category_id', 'book_id');
    // }

    public function books(){
        return $this->belongsToMany("App\Models\Book");
    }
}
