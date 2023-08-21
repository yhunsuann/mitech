<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTranslate extends Model
{
    use HasFactory;
    
    protected $table = 'article_translates';
    public $timestamps = false;
    const UPDATED_AT = NULL;
  
    protected $fillable = [
        'language_code',
        'article_id',
        'title',
        'description',
        'content',
        'avatar',
        'slug'
    ];
}