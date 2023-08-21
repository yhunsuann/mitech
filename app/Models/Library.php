<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\FAQTranslate;

class Library extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'libraries';

    protected $fillable = [
        'avatar',
        'images',
        'type',
        'status'
    ];
}
