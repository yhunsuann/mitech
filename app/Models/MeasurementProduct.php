<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasurementProduct extends Model
{
    use HasFactory;
    protected $table = 'measurement_products';
    const UPDATED_AT =  NULL;
    public $timestamps = false;

    protected $fillable = [
        'product_id', 
        'thickness', 
        'thickness_unit',
        'price',
        'width',
        'height'
    ];
    
    public function productRelation()
    {
        return $this->belongsTo(Product::class,'product_id', 'id');
    }
}
