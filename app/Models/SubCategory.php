<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'subcat_name',
        'cat_id',
        'subcat_slug',
        'subcat_image',
        
    ];

    function cat(){
       return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
}
