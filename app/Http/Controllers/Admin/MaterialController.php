<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MaterialRepository;
use App\Repositories\MaterialTranslateRepository;
use App\Repositories\LanguageRepository;
use App\Http\Requests\MaterialRequest;
use App\Models\Material;

class MaterialController extends Controller
{    
    /**
     * materialRepository
     *
     * @var mixed
     */
    protected $materialRepository;
    
    /**
     * materialTranslateRepository
     *
     * @var mixed
     */
    protected $materialTranslateRepository;
        
    /**
     * languageRepository
     *
     * @var mixed
     */
    protected $languageRepository;
        
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        MaterialRepository $materialRepository, 
        LanguageRepository $languageRepository,
        MaterialTranslateRepository $materialTranslateRepository
    ) {
        $this->materialRepository = $materialRepository;
        $this->languageRepository = $languageRepository;
        $this->materialTranslateRepository = $materialTranslateRepository;
    }
    
    /**
     * get index page
     *
     * @return void
     */
    public function index(Request $request)
    { 
        $materials = $this->materialRepository->getPaginate($request->all());
       
        return view('admin.material.index', compact('materials'));    
    }
    
    /**
     * Create distributor page
     *
     * @return void
     */
    public function create()
    {
        $langs = $this->languageRepository->listLanguage();

        return view('admin.material.create', compact('langs'));
    }
    
    /**
     * Add material
     *
     * @param  mixed $request
     * @return void
     */
    public function store(MaterialRequest $request)
    {
        $material = $this->materialRepository->create(
            $request->only([
                'type',
                'amount',
                'quantity'
            ])
        ); 

        $qty = count($request['language_code']);
        for ($i = 0; $i < $qty; $i++) { 
            $this->materialTranslateRepository->create([
                'material_id' => $material->id,
                'name' => $request['name'][$i],
                'unit' => $request['unit'][$i],
                'language_code' => $request['language_code'][$i]
            ]);
        }

        return redirect()->route('admin.material.index')->with('success', 'Thêm mới vật liệu thành công.');
    }
    
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        $material = $this->materialRepository->findOrFail($id);
        $material->trans()->delete();
        $material->delete();

        return back()->withSuccess('Xóa vật liệu thành công'); 
    }
    
    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $langs = $this->languageRepository->listLanguage();
        $materials = $this->materialRepository->getInfoById($id);
       
        return view('admin.material.edit', compact('langs' ,'materials'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(MaterialRequest $request, $id)
    {   
        $this->materialRepository->where('id', $id)->update(
            $request->only([
                'type', 'quantity', 'amount'
            ])
        );
    
        $qty = count($request['language_code']);
        for ($i = 0; $i < $qty; $i++) {
            $this->materialTranslateRepository
                    ->where('material_id', $id)
                    ->where('language_code', $request['language_code'][$i])
                    ->update([
                        'name' => $request['name'][$i],
                        'unit' => $request['unit'][$i]
                    ]);
        }
    
        return redirect()->route('admin.material.index')->with('success', 'Cập nhật vật liệu thành công');
    }    
}
