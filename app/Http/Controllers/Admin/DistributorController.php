<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\DistributorRepository;
use App\Repositories\LanguageRepository;
use App\Services\FileUploader;
use App\Http\Controllers\Controller;
use App\Http\Requests\DistributorRequest;
use App\Models\Distributor;

class DistributorController extends Controller
{    
    /**
     * distributorRepository
     *
     * @var mixed
     */
    protected $distributorRepository;
        
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
     * __construct
     *
     * @return void
     */
    public function __construct(
        DistributorRepository $distributorRepository, 
        LanguageRepository $languageRepository
    ) {
        $this->distributorRepository = $distributorRepository;
        $this->languageRepository = $languageRepository;
        $this->fileUploader = new FileUploader;
    }
    
    /**
     * get index page
     *
     * @return void
     */
    public function index(Request $request)
    { 
        $distributors = $this->distributorRepository->allDistributors($request->all());
       
        return view('admin.distributor.index', compact('distributors'));    
    }
    /**
     * Create distributor page
     *
     * @return void
     */
    public function create()
    {

        $jsonFilePath = public_path('frontEnd/json/data.json');
        $jsonData = file_get_contents($jsonFilePath);
        $data = json_decode($jsonData, true);
        $distributor = new Distributor();
        
        return view('admin.distributor.form', compact('data', 'distributor'));
    }
    
    /**
     * Add distributor
     *
     * @param  mixed $request
     * @return void
     */
    public function store(DistributorRequest $request)
    {   
        $distributor = $this->distributorRepository->create($request->except('_token'));

        return redirect()->route('admin.distributor.index')->withSuccess('Thêm mới nhà phân phối thành công.');
    }
    
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        $this->distributorRepository->findOrFail($id)->delete();

        return back()->withSuccess('Xóa nhà phân phối thành công.'); 
    }
    
    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $jsonFilePath = public_path('frontEnd/json/data.json');
        $jsonData = file_get_contents($jsonFilePath);
        $data = json_decode($jsonData, true);
        $distributor = $this->distributorRepository->findOrFail($id);

        return view('admin.distributor.form', compact('distributor', 'data'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(DistributorRequest $request, $id)
    {   
        $this->distributorRepository->where('id', $id)->update($request->except('_token'));

        return redirect()->route('admin.distributor.index')->withSuccess('Cập nhật nhà phân phối thành công.');
    }    
}
