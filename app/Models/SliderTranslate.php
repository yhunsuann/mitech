<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderTranslate extends Model
{
    use HasFactory;
    
    /**
     * table
     *
     * @var string
     */
    protected $table = 'slider_translates';
        
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
        'file',
        'link',
        'name',
        'slider_id',
        'language_code'
    ];
}
