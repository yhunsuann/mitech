<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $table = 'languages';

    
    protected $fillable = [
        'language_code',
        'language_name'
    ];

    public function constantTranslates()
    {
        return $this->hasMany(ConstantTranslate::class,'language_code', 'language_code');
    }

    public function productTranslates()
    {
        return $this->hasMany(ProductTranslate::class,'language_code', 'language_code');
    }
}


