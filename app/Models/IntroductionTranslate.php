<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntroductionTranslate extends Model
{
    use HasFactory;
    
    /**
     * table
     *
     * @var string
     */
    protected $table = 'introduction_translates';
        
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
        'introduction_id',
        'language_code',
        'mitect_title',
        'mitect_content',
        'mitect_file',
        'vgsi_title',
        'vgsi_file',
        'about_file',
        'content_about_1',
        'content_about_2',
        'content_about_3',
        'vision_title',
        'vision_content',
        'vision_file',
        'mission_title',
        'mission_content',
        'mission_file'
    ];
}
