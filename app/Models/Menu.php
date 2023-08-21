<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\MenuTranslate;

class Menu extends Model
{
    protected $table = 'menus';
    use HasFactory;
    const UPDATED_AT = NULL;
  
    protected $fillable = [
        'stauts',
        'is_menu',
        'sort',
        'id_parent'
    ];
    public function children()
    {
        return $this->hasMany(Menu::class, 'id_parent', 'id')->orderBy('sort');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'id_parent', 'id');
    }
    public function menuTransateDefault()
    {
        return $this->hasMany(MenuTranslate::class, 'menu_id', 'id')->where('language_code', app()->getLocale());
    }

    public function translate_other()
    {
        return $this->hasOne(MenuTranslate::class, 'menu_id', 'id')->where('language_code', '!=' , app()->getLocale());
    }
}