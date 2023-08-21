<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LibraryRepository;

class LibraryController extends Controller
{
    protected $libraryRepository;

    public function __construct(LibraryRepository $libraryRepository)
    {
        $this->libraryRepository = $libraryRepository;
    }
    
    public function getLirary(Request $request)
    {
        $libraries = $this->libraryRepository->getList($request->all());
  
        return response()->json($libraries);
    }
}
