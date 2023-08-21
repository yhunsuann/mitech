<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialTranslate extends Model
{
    use HasFactory;
    
    /**
     * table
     *
     * @var string
     */
    protected $table = 'material_translates';
    
    /**
     * timestamps
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'unit',
        'material_id',
        'language_code'
    ];
}
