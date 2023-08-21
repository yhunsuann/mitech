<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTranslate extends Model
{
    use HasFactory;
    protected $table = 'product_translates';
    public $timestamps = false;
    const UPDATED_AT = NULL;

    protected $fillable = [
        'product_id', 
        'language_code', 
        'description',
        'content',
        'name',
        'slug'
    ];
    
    public function language()
    {
        return $this->belongsTo(Language::class,'language_code', 'language_code');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id', 'id');
    }
}
