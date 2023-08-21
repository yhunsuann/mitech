<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    
    /**
     * table
     *
     * @var string
     */
    protected $table = 'materials';
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'amount',
        'quantity',
        'total_cost'
    ];
    
    /**
     * trans
     *
     * @return void
     */
    public function trans()
    {
        return $this->hasMany(MaterialTranslate::class, 'material_id', 'id');
    }
}
