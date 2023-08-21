<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    
    /**
     * table
     *
     * @var string
     */
    protected $table = 'sliders';
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'status'
    ];
}
