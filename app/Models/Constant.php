<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constant extends Model
{
    use HasFactory;
    
    /**
     * table
     *
     * @var string
     */
    protected $table = 'constants';
        
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'type',
        'status'
    ];
    
    /**
     * trans
     *
     * @return void
     */
    public function trans()
    {
        return $this->hasMany(ConstantTranslate::class, 'constant_id', 'id');
    }
}
