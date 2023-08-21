<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslate extends Model
{
    use HasFactory;
    protected $table = 'category_translates';
    public $timestamps = false;
    const UPDATED_AT = NULL;

    protected $fillable = [
        'category_id', 
        'language_code', 
        'name_category',
        'description'
    ];
    
    public function language()
    {
        return $this->belongsTo(Language::class,'language_code', 'language_code');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }
}
