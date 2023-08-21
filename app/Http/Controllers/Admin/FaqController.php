<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LanguageRepository;
use App\Repositories\FAQRepository;
use App\Repositories\FAQTranslateRepository;
use App\Http\Requests\FAQRequest;

class FaqController extends Controller
{
    protected $languageRepository;
    protected $faqRepository;
    protected $faqTranslateRepository;

    public function __construct(
        LanguageRepository $languageRepository,
        FAQTranslateRepository $faqTranslateRepository,
        FAQRepository $faqRepository
    ) {
        $this->languageRepository = $languageRepository;
        $this->faqRepository = $faqRepository;
        $this->faqTranslateRepository = $faqTranslateRepository;
    }

    public function index(Request $request)
    {
        $faqs = $this->faqRepository->getList($request->all());

        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        $result = $this->languageRepository->listLanguage();

        return view('admin.faq.create', compact('result'));
    }

    public function store(FAQRequest $request)
    {   
        $faq = $this->faqRepository->create(
            $request->only([
                        'topic',
                        'status'
                    ])
        );
        
        $qty = count($request['language_code']);

        for ($i = 0; $i < $qty; $i++) { 
            $this->faqTranslateRepository->create([
                                            'faq_id' => $faq->id,
                                            'language_code' => $request['language_code'][$i],
                                            'question' => $request['question'][$i],
                                            'answer' => $request['answer'][$i]
                                        ]);
        }

        return redirect()->route('admin.faq.index')->with('success', 'Create FAQ Successfully');
    }

    public function edit($id)
    {
        $result = $this->languageRepository->listLanguage();
        $faq = $this->faqRepository->getInfoById($id);
  
        return view('admin.faq.edit', compact(['result', 'faq']));
    }

    public function delete($id)
    {
        $this->faqRepository->find($id)->delete();

        return redirect()->route('admin.faq.index')->with('success', 'Delete FAQ Successfully');
    }

    public function update(FAQRequest $request, $id)
    {
        $this->faqRepository->where('id', $id)->update(
            $request->only([
                        'topic',
                        'status'
                    ])
        );

        $qty = count($request['language_code']);

        for ($i = 0; $i < $qty; $i++) { 
            $this->faqTranslateRepository->where('faq_id', $id)
                                        ->where('language_code', $request['language_code'][$i])
                                        ->update([
                                            'question' => $request['question'][$i],
                                            'answer' => $request['answer'][$i]
                                        ]);
        }
        
        return redirect()->route('admin.faq.index')->with('success', 'Edit FAQ Successfully');
    }
}