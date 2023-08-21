<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Introduction;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class IntroductionRepositoryEloquent extends BaseRepository implements IntroductionRepository
{    
    /**
     * model
     *
     * @return void
     */
    public function model()
    {
        return Introduction::class;
    }
    
    /**
     * boot
     *
     * @return void
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    /**
     * getInfoById
     *
     * @param  mixed $id
     * @return void
     */
    public function getItem()
    {
        return $this->model
                ->select([
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
                ])
                ->join('introduction_translates', 'introductions.id', 'introduction_translates.introduction_id')
                ->orderBy('language_code', 'desc')
                ->get();
    }
    
    /**
     * getInfo
     *
     * @return void
     */
    public function getInfo()
    {
        return $this->model
                ->select([
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
                ])
                ->join('introduction_translates', 'introductions.id', 'introduction_translates.introduction_id')
                ->where('introduction_translates.language_code', app()->getLocale())
                ->first();
    }
}
