<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'documents';

    protected $fillable = [
        'file',
        'status',
        'type',
        'deleted_at',
        'avatar'
    ];
}
