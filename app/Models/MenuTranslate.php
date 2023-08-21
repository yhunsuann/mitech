<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuTranslate extends Model
{
    use HasFactory;
    protected $table = 'menu_translates';
    public $timestamps = false;
    const UPDATED_AT = NULL;

    protected $fillable = [
        'language_code', 
        'menu_id', 
        'menu_name',
        'lug',
    ];
}
