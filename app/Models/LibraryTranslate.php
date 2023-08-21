<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryTranslate extends Model
{
    use HasFactory;

    protected $table = 'library_translates';
    public $timestamps = false;
    const UPDATED_AT = NULL;

    protected $fillable = [
        'library_id',
        'language_code',
        'name',
        'slug'
    ];
}
