<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CategoryTranslate;
use App\Models\MeasurementProduct;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    const UPDATED_AT = NULL;
  
    protected $fillable = [
        'status',
        'type'
    ];
    
    public function categoryTranslates()
    {
        return $this->hasMany(CategoryTranslate::class, 'category_id', 'id');
    }

    public function categoryProduct()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function category_default()
    {
        return $this->hasOne(CategoryTranslate::class, 'category_id', 'id')->where('language_code', config('app.locale'));
    }
}
