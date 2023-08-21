<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Repositories\FAQRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\LibraryRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\DocumentRepository;

class ResourcesController extends Controller
{    
    /**
     * faqRepository
     *
     * @var mixed
     */
    protected $faqRepository;
        
    /**
     * libraryRepository
     *
     * @var mixed
     */
    protected $libraryRepository;
        
    /**
     * articleRepository
     *
     * @var mixed
     */
    protected $articleRepository;
        
    /**
     * documentRepository
     *
     * @var mixed
     */
    protected $documentRepository;

    /**
     * materialRepository
     *
     * @var mixed
     */
    protected $materialRepository;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (
        FAQRepository $faqRepository,
        LibraryRepository $libraryRepository,
        ArticleRepository $articleRepository,
        MaterialRepository $materialRepository,
        DocumentRepository $documentRepository
    ) {
        $this->faqRepository = $faqRepository;
        $this->libraryRepository = $libraryRepository;
        $this->documentRepository = $documentRepository;
        $this->articleRepository = $articleRepository;
        $this->materialRepository = $materialRepository;
    }
    
    /**
     * getIndex
     *
     * @return void
     */
    public function getIndex() 
    {   
        $params = request()->all(); 
        $faqs = $this->faqRepository->getListClient($params);
        $replacements = $this->articleRepository->getList($params, 'replacement');
        $libraries = $this->libraryRepository->getList($params);
        $documents = $this->documentRepository->getList($params);

        return view('client.documents.index', compact(['faqs', 'replacements', 'libraries', 'documents']));
    }
    
    /**
     * getFaq
     *
     * @param  mixed $request
     * @return void
     */
    public function getFaq($request)
    {
        $faqs = $this->faqRepository->getListClient($request->all());
      
        return view('client.documents.faq.index', compact('faqs'));
    }
    
    /**
     * getDetailFaq
     *
     * @param  mixed $request
     * @return void
     */
    public function getDetailFaq($request)
    {
        $faqs = $this->faqRepository->getListClient($request->all());
        
        return view('client.documents.faq.index', compact('faqs'));
    }

    /**
     * getWarrantyInformation
     *
     * @param  mixed $request
     * @return void
     */
    public function getWarrantyInformation($request)
    {
        $replacements = $this->articleRepository->getList($request->all(), 'replacement');
    
        return view('client.documents.warranty-information.index', compact('replacements'));
    }
    
    /**
     * getDetailWarrantyInformation
     *
     * @param  mixed $request
     * @param  mixed $menu_detail
     * @return void
     */
    public function getDetailWarrantyInformation($request, $menu_detail)
    {
        $replacement = $this->articleRepository->getInfoBySlug($menu_detail, 'replacement');
        if (!$replacement->isNotEmpty()) {
            abort(404);
        }
    
        return view('client.documents.warranty-information.detail', compact('replacement'));
    }
    
    /**
     * getDocumentsfiles
     *
     * @param  mixed $request
     * @return void
     */
    public function getDocumentsfiles($request)
    {
        $documents = $this->documentRepository->getList($request->all());
        $types = $this->documentRepository->getType();
       
        return view('client.documents.documents-files.index', compact('documents', 'types'));
    }
    
    /**
     * getDetailDocumentsfiles
     *
     * @param  mixed $request
     * @return void
     */
    public function getDetailDocumentsfiles($request)
    {
        return view('client.documents.documents-files.index');
    }
    
    /**
     * getMaterialCostEstimation
     *
     * @param  mixed $request
     * @return void
     */
    public function getMaterialCostEstimation($request)
    {
        $materials = $this->materialRepository->getDatas()->groupBy('type');

        return view('client.documents.material-cost-estimation.index', compact('materials'));
    }
    
    /**
     * getDetailMaterialCostEstimation
     *
     * @param  mixed $request
     * @return void
     */
    public function getDetailMaterialCostEstimation($request)
    {
        return view('client.documents.material-cost-estimation.index');
    }
    
    /**
     * getCeilingsLibrary
     *
     * @param  mixed $request
     * @return void
     */
    public function getCeilingsLibrary($request)
    {  
        $libraries = $this->libraryRepository->getList($request->all());
        $names = $this->libraryRepository->getType();

        return view('client.documents.ceilings-library.index', compact('libraries', 'names'));
    } 
    
    /**
     * getDetailCeilingsLibrary
     *
     * @param  mixed $request
     * @param  mixed $menu_detail
     * @return void
     */
    public function getDetailCeilingsLibrary($request, $menu_detail)
    {  

        $library = $this->libraryRepository->getInfoBySlug($menu_detail);
        if (!$library->isNotEmpty()) {
            abort(404);
        }

        $libraries = $this->libraryRepository->getList($request->all());

        return view('client.documents.ceilings-library.detail', compact(['library', 'libraries']));
    } 
    
    /**
     * getTechincalInformation
     *
     * @param  mixed $request
     * @return void
     */
    public function getTechincalInformation($request)
    {  
        $technical = $this->articleRepository->getList($request->all(), 'techincal');

        return view('client.documents.techincal-information.index', compact('technical'));
    } 
    
    /**
     * getDetailTechincalInformation
     *
     * @param  mixed $request
     * @param  mixed $menu_detail
     * @return void
     */
    public function getDetailTechincalInformation($request, $menu_detail)
    {  
        $technical = $this->articleRepository->getInfoBySlug($menu_detail, 'techincal');
        if (!$technical->isNotEmpty()) {
            abort(404);
        }

        return view('client.documents.techincal-information.detail', compact('technical'));
    } 

    /**
     * getInstallationGuide
     *
     * @param  mixed $request
     * @return void
     */
    public function getInstallationGuide($request)
    {  
        $installation_guide = $this->articleRepository->getList($request->all(), 'installation-guide');

        return view('client.documents.installation-guide.index', compact('installation_guide'));
    } 

    public function getDetailInstallationGuide($request, $menu_detail)
    {  
        $installation_guide = $this->articleRepository->getInfoBySlug($menu_detail, 'installation-guide');
        if (!$installation_guide->isNotEmpty()) {
            abort(404);
        }

        $installation_guides = $this->articleRepository->getList($request->all(), 'installation-guide');
    
        return view('client.documents.installation-guide.detail', compact(['installation_guide', 'installation_guides']));
    } 
    
    /**
     * getZeitGypsumIdentification
     *
     * @param  mixed $request
     * @return void
     */
    public function getZeitGypsumIdentification($request)
    {  
        $identifications = $this->articleRepository->getList($request->all(), 'identification');
  
        return view('client.documents.zeit-gypsum-identification.index', compact('identifications'));
    } 
    
    /**
     * getDetailZeitGypsumIdentification
     *
     * @param  mixed $request
     * @param  mixed $menu_detail
     * @return void
     */
    public function getDetailZeitGypsumIdentification($request, $menu_detail)
    {  
        $identification = $this->articleRepository->getInfoBySlug($menu_detail, 'identification');
        if (!$identification->isNotEmpty()) {
            abort(404);
        }

        $identifications = $this->articleRepository->getList($request->all(), 'identification');
    
        return view('client.documents.zeit-gypsum-identification.detail', compact(['identification', 'identifications']));
    } 
    
    /**
     * getWarrantyPolicyForm
     *
     * @param  mixed $request
     * @return void
     */
    public function getWarrantyPolicyForm($request)
    {   
        return view('client.documents.warranty-policy-form.index');
    } 
}
