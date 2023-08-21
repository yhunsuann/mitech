<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormProduct extends Model
{
    protected $table = 'form_products';
    use HasFactory;
    const UPDATED_AT = NULL;
  
    protected $fillable = [
        'name',
        'phone',
        'email',
        'language_code',
        'message'
    ];
}
