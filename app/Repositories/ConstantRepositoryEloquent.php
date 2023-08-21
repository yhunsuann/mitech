<?php

namespace App\Repositories;

use App\Repositories\ConstantRepository;
use App\Models\Constant;
use App\Services\FileUploader;
use App\Models\ConstantTranslate;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class ConstantRepositoryEloquent extends BaseRepository implements ConstantRepository
{    
    public function model()
    {
        return Constant::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
        
    /**
     * fileUploader
     *
     * @var mixed
     */
    protected $fileUploader;
    
    /**
     * allConstant
     *
     * @return void
     */
    public function getAllConstant(){
        return $this->model
                ->with('trans')
                ->get();
    }
    
    /**
     * save
     *
     * @param  mixed $data
     * @return void
     */
    public function save($lang_code, $data)
    {
        foreach ($data as $key => $item) {
            if (isset($item['value']) && $item['value'] instanceof \Illuminate\Http\UploadedFile) {
                $file_name = null;
                $file_name = (new FileUploader)->uploadFileContact($item['value']);
 
                if ($file_name !== null) {
                    $item['value'] = $file_name;
                }
            }
            
            if (isset($item['value'])) {
                $conf = ConstantTranslate::where('constant_id', $key)->where('language_code', $lang_code)->first();
                
                if (!empty($conf)) {
                    $conf->update([
                        'value' => $item['value']
                    ]);
                } else {
                    ConstantTranslate::insert([
                        'language_code' => $lang_code,
                        'constant_id' => $key,
                        'value' => $item['value']
                    ]);
                }
            }
        }
    }
    
    /**
     * getByLang
     *
     * @return void
     */
    public function getByLang($code)
    {
        return $this->model
                ->join('constant_translates', 'constants.id', 'constant_translates.constant_id')
                ->where('language_code', $code)
                ->pluck('value', 'key')
                ->toArray();
    }
} 
   