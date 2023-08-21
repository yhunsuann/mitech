<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LanguageRepository;
use App\Repositories\DocumentRepository;
use App\Repositories\DocumentTranslatesRepository;
use App\Services\FileUploader;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;

class DocumentController extends Controller
{
    protected $languageRepository;
    protected $fileUploader;
    protected $documentRepository;
    protected $documentTranslateRepository;

    public function __construct(
        LanguageRepository $languageRepository,
        DocumentRepository $documentRepository,
        DocumentTranslatesRepository $documentTranslateRepository
    ) {
        $this->languageRepository = $languageRepository;
        $this->fileUploader = new FileUploader;
        $this->documentRepository = $documentRepository;
        $this->documentTranslateRepository = $documentTranslateRepository;
    }
    
    public function index(Request $request)
    {
        $documents = $this->documentRepository->getList($request->all());
   
        return view('admin.document.index', compact('documents'));
    }

    public function create()
    {
        $result = $this->languageRepository->listLanguage();

        return view('admin.document.create', compact('result'));
    }

    public function store(StoreDocumentRequest $request)
    {
        if ($request->has('document_file')) {
            $file_name = $this->fileUploader->uploadFile($request, 'document');
            if ($file_name !== null) {
                $request->merge(['file' => $file_name]);
            }
        } 

        if ($request->has('upload_avatar')) {
            $file_name = $this->fileUploader->uploadFile($request, 'document');
            if ($file_name !== null) {
                $request->merge(['avatar' => $file_name]);
            }
        }

        $document = $this->documentRepository->create(
            $request->only([
                        'avatar',
                        'file',
                        'status',
                        'type'
                    ])
        );

        $qty = count($request['language_code']);
    
        for ($i = 0; $i < $qty; $i++) { 
            $this->documentTranslateRepository->create([
                'document_id' => $document->id,
                'name' => $request['name'][$i],
                'language_code' => $request['language_code'][$i]
            ]);
        }

        return redirect()->route('admin.document.index')->with('success', 'Thêm mới tài liệu thành công');
    }

    public function edit($id)
    {
        $result = $this->languageRepository->listLanguage();
        $document = $this->documentRepository->getInfoById($id);
 
        return view('admin.document.edit', compact('result' ,'document'));
    }

    public function update(UpdateDocumentRequest $request, $id)
    {
        $document = [];
    
        if ($request->has('document_file')) {
            $file_name = $this->fileUploader->uploadFile($request, 'document');
            if ($file_name !== null) {
                $document['file'] = $file_name;
            }
        }

        if ($request->has('upload_avatar')) {
            $file_name = $this->fileUploader->uploadFile($request, 'document');
            if ($file_name !== null) {
                $document['avatar'] = $file_name;
            }
        } else if($request->has('old_avatar')){
            $document['avatar'] = null;
        }
    
        $document['status'] = $request->input('status');
        $document['type'] = $request->input('type');
    
        $this->documentRepository->where('id', $id)->update($document);
    
        $qty = count($request['language_code']);
    
        for ($i = 0; $i < $qty; $i++) {
            $this->documentTranslateRepository->where('document_id', $id)
                                            ->where('language_code', $request['language_code'][$i])
                                            ->update([
                                                'name' => $request['name'][$i]
                                            ]);
        }
    
        return redirect()->route('admin.document.index')->with('success', 'Cập nhật tài liệu thành công');
    }

    public function delete($id)
    {
        $this->documentRepository->find($id)->delete();

        return redirect()->route('admin.document.index')->with('success', 'Xóa tài liệu thành công');
    }
}
