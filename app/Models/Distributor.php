<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distributor extends Model
{
    use HasFactory;

    const UPDATED_AT = NULL;
    
    /**
     * table
     *
     * @var string
     */
    protected $table = 'distributors';
      
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'latitude',
        'longitude',
        'category',
        'status',
        'phone_number',
        'website',
        'email',
        'name', 
        'location',
        'city',
        'region'
    ];
}
