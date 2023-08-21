<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductTranslate;
use App\Models\MeasurementProduct;

class Product extends Model
{
    protected $table = 'products';
    use HasFactory;
    const UPDATED_AT = NULL;
  
    protected $fillable = [
        'avatar',
        'status',
        'image',
        'category_id'
    ];
    
    public function productTranslates()
    {
        return $this->hasMany(ProductTranslate::class, 'product_id', 'id');
    }

    public function productCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function measurementProduct()
    {
        return $this->hasMany(MeasurementProduct::class, 'product_id', 'id');
    }

    public function product_default()
    {
        return $this->hasOne(ProductTranslate::class, 'product_id', 'id')->where('language_code', config('app.locale'));
    }
}
