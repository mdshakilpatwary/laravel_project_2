<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddProduct extends Model
{
    use HasFactory;


    protected $fillable = [
        'pname',
        'pcode',
        'pimage',
        'salep',
        'costp',
        'qnt',
        'desc',

    ];
}
