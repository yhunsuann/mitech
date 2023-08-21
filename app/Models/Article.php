<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'articles';

    protected $fillable = [
        'status',
        'type',
        'outstanding',
        'category_id'
    ];

    public function translate_other()
    {
        return $this->hasOne(ArticleTranslate::class, 'article_id', 'id')->where('language_code', '!=' , app()->getLocale());
    }
}
