<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    use HasFactory;
    const UPDATED_AT = NULL;
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone_number',
        'message',
        'language_code'
    ];
}
