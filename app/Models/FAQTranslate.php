<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQTranslate extends Model
{
    use HasFactory;

    protected $table = 'faq_translates';
    public $timestamps = false;
    const UPDATED_AT = NULL;

    protected $fillable = [
        'faq_id',
        'language_code',
        'question',
        'answer'
    ];
}
