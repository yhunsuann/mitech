<?php
namespace App\Repositories;

Interface DistributorRepository
{    
    public function allDistributors($data = []);
    public function getDistributors($data = []);   
} 
