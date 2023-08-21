<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use Illuminate\Http\Request;
use App\Repositories\DistributorRepository;
use App\Http\Requests\Client\DistributorRequest;

class DistributorController extends Controller
{    
    /**
     * productRepository
     *
     * @var mixed
     */
    protected $distributorRepository;
        
    /**
     * __construct
     *
     * @param  mixed $distributorRepository
     * @return void
     */
    public function __construct(DistributorRepository $distributorRepository)
    {
        $this->distributorRepository = $distributorRepository;
    }
    
    /**
     * index
     *
     * @return void
     */
    public function getIndex()
    { 
        $jsonFilePath = public_path('frontEnd/json/data.json');
        $jsonData = file_get_contents($jsonFilePath);
        $provinces = json_decode($jsonData, true);

        return view('client.where-to-buy.index', compact('provinces')); 
    }
    
    /**
     * getData
     *
     * @return void
     */
    public function getData()
    {
        $jsonFilePath = public_path('frontEnd/json/data.json');
        $jsonData = file_get_contents($jsonFilePath);
        $data = json_decode($jsonData, true);
        
        return response()->json($data);
    }
    
    /**
     * getDistributors
     *
     * @return void
     */
    public function getDistributors()
    {
        $distributors = $this->distributorRepository->getDataDistributors();
        
        return response()->json($distributors);
    }
}

