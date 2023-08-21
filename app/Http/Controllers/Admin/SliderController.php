<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LanguageRepository;
use App\Repositories\SliderRepository;
use App\Http\Requests\SliderStoreRequest;
use App\Models\SliderTranslate;
use App\Services\FileUploader;
use Cocur\Slugify\Slugify;

class SliderController extends Controller
{    
    /**
     * languageRepository
     *
     * @var mixed
     */
    protected $languageRepository;
        
    /**
     * fileUploader
     *
     * @var mixed
     */
    protected $fileUploader;
        
    /**
     * sliderRepository
     *
     * @var mixed
     */
    protected $sliderRepository;
        
    public function __construct(
        LanguageRepository $languageRepository,
        SliderRepository $sliderRepository,
    ) {
        $this->languageRepository = $languageRepository;
        $this->fileUploader = new FileUploader;
        $this->sliderRepository = $sliderRepository;
    }
    
    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        $sliders = $this->sliderRepository->getList($request->all());
   
        return view('admin.slider.index', compact('sliders'));
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $result = $this->languageRepository->listLanguage();

        return view('admin.slider.create', compact('result'));
    }
    
    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $result = $this->languageRepository->listLanguage();
        $slider = $this->sliderRepository->getInfoById($id);

        return view('admin.slider.edit', compact('result' ,'slider'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $slider = $this->sliderRepository->where('id', $id)->update($request->only('status'));

        if ($slider) {
            for ($i = 0; $i < count($request['language_code']); $i++) { 
                $trans = SliderTranslate::where('slider_id', $id)
                    ->where('language_code', $request['language_code'][$i])
                    ->first();

                $trans->update([
                    'name' => $request['name'][$i] ?? '',
                    'link' => $request['link'][$i] ?? '',
                    'language_code' => $request['language_code'][$i]
                ]);

                if (!empty($trans) && !empty($request['file_' . $i])) {
                    $trans->file = $this->fileUploader->uploadSlider($request['file_'. $i], 'slider');
                    $trans->save();
                }
            }
        }

        return redirect()->route('admin.slider.index')->with('success', 'Chỉnh sửa slider thành công.');
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(SliderStoreRequest $request)
    {
        $slider = $this->sliderRepository->create($request->only('status'));

        if ($slider) {
            for ($i = 0; $i < count($request['language_code']); $i++) { 
                $trans = SliderTranslate::create([
                    'slider_id' => $slider->id,
                    'name' => $request['name'][$i] ?? '',
                    'link' => $request['link'][$i] ?? '',
                    'language_code' => $request['language_code'][$i]
                ]);

                if (!empty($trans) && !empty($request['file_' . $i])) {
                    $trans->file = $this->fileUploader->uploadSlider($request['file_' . $i], 'slider');
                    $trans->save();
                }
            }
        }

        return redirect()->route('admin.slider.index')->with('success', 'Thêm mới slider thành công.');
    }
    
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        $this->sliderRepository->find($id)->delete();

        return redirect()->route('admin.slider.index')->with('success', 'Xóa slider thành công');
    }
}