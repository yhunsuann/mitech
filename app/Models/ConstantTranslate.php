<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstantTranslate extends Model
{
    use HasFactory;
        
    /**
     * timestamp
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'constant_translates';
        
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'constant_id',
        'value',
        'language_code'
    ];
}
