<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormReplacement extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'form_replacements';

    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'phone_number',
        'time',
        'address'
    ];
}
