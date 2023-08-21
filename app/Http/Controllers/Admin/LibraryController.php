<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LanguageRepository;
use App\Repositories\LibraryRepository;
use App\Repositories\LibraryTranslateRepository;
use App\Http\Requests\LibraryRequest;
use App\Services\FileUploader;
use Cocur\Slugify\Slugify;

class LibraryController extends Controller
{
    protected $languageRepository;
    protected $fileUploader;
    protected $libraryRepository;
    protected $libraryTranslateRepository;

    public function __construct(
        LanguageRepository $languageRepository,
        LibraryRepository $libraryRepository,
        LibraryTranslateRepository $libraryTranslateRepository
    ) {
        $this->languageRepository = $languageRepository;
        $this->fileUploader = new FileUploader;
        $this->libraryRepository = $libraryRepository;
        $this->libraryTranslateRepository = $libraryTranslateRepository;
    }

    public function index(Request $request)
    {
        $libraries = $this->libraryRepository->getList($request->all());
   
        return view('admin.library.index', compact('libraries'));
    }

    public function create()
    {
        $result = $this->languageRepository->listLanguage();

        return view('admin.library.create', compact('result'));
    }

    public function edit($id)
    {
        $result = $this->languageRepository->listLanguage();
        $library = $this->libraryRepository->getInfoById($id);

        return view('admin.library.edit', compact('result' ,'library'));
    }

    public function update(LibraryRequest $request, $id)
    {
        $data_library = [
            'status' => $request['status'],
            'type' => $request['type'],
        ];

        if ($request->has('upload_avatar')) {
            $file_name = $this->fileUploader->uploadFile($request , 'library');
            if ($file_name !== null) {
                $data_library['avatar'] = $file_name;
            }
        } else if($request->has('old_avatar')){
            $data_library['avatar'] = null;
        }

        if ($request->has('upload_images')) { 
            if (empty($request->old_image)) {
                $array1 = [];
            } else {
                $str1 = str_replace(['[', ']', '"'], '', $request->old_image);
                $array1 = explode(',', $str1);
            }

            $file_name = $this->fileUploader->uploadMutilFile($request, 'library');
            $str2 = str_replace(['[', ']', '"'], '', $file_name);
            $array2 = explode(',', $str2);
            $result = array_merge($array1, $array2);
            $image = json_encode($result);
      
            if ($image !== null) {
                $data_library['images'] = $image;
            }

        } else { 
            $str1 = str_replace(['[', ']', '"'], '', $request->old_image);
            $array1 = explode(',', $str1);
            $image = json_encode($array1);

            if($image != '[""]'){
                $data_library['images'] = $image;
            } else {
                $data_library['images'] = null;
            }
        }

        $this->libraryRepository->where('id', $id)->update($data_library);  
        $qty = count($request['language_code']);
        $slugify = new Slugify();

        for ($i = 0; $i < $qty; $i++) { 
            $name = $request['name'][$i];
            $slug = $slugify->slugify($name, '-');

            $this->libraryTranslateRepository->where('library_id', $id)
                                            ->where('language_code', $request['language_code'][$i])
                                            ->update([
                                                'name' => $request['name'][$i],
                                                'slug' => $slug 
                                            ]);
        }

        return redirect()->route('admin.library.index')->with('success', 'Chỉnh sửa thư viện thành công.');
    }

    public function store(LibraryRequest $request)
    {
        if ($request->has('upload_avatar')) {
            $file_name = $this->fileUploader->uploadFile($request , 'library');
            if ($file_name !== null) {
                $request->merge(['avatar' => $file_name]);
            }
        }

        if ($request->has('upload_images')) {
            $file_name = $this->fileUploader->uploadMutilFile($request, 'library');
            if ($file_name !== null) {
                $request->merge(['images' => $file_name]);
            }
        }

        $library = $this->libraryRepository->create(
            $request->only([
                        'avatar',
                        'images',
                        'status',
                        'type'
                    ])
        );

        $qty = count($request['language_code']);
        
        $slugify = new Slugify();
        for ($i = 0; $i < $qty; $i++) { 
            $name = $request['name'][$i];
            $slug = $slugify->slugify($name, '-');
     
            $this->libraryTranslateRepository->create([
                                                'library_id' => $library->id,
                                                'language_code' => $request['language_code'][$i],
                                                'name' => $request['name'][$i],
                                                'slug' => $slug
                                            ]);
        }
    
        return redirect()->route('admin.library.index')->with('success', 'Thêm mới thư viện thành công.');
    }

    public function delete($id)
    {
        $this->libraryRepository->find($id)->delete();

        return redirect()->route('admin.library.index')->with('success', 'Xóa thư viện thành công');
    }
}