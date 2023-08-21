<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormNew extends Model
{
    protected $table = 'form_news';
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'subscribtionEmail',
    ];
}
