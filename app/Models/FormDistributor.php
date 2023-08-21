<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormDistributor extends Model
{
    protected $table = 'form_distributors';
    use HasFactory;
    const UPDATED_AT = NULL;
  
    protected $fillable = [
        'full_name',
        'distributor_phone',
        'email_address',
        'position',
        'address_1',
        'address_2',
        'language_code',
        'form_type',
        'city',
        'district'
    ];
}
