<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentTranslate extends Model
{
    use HasFactory;
    
    protected $table = 'document_translates';
  
    public $timestamps = false;
    const UPDATED_AT = NULL;
  
    protected $fillable = [
        'language_code',
        'document_id',
        'name'
    ];
}
