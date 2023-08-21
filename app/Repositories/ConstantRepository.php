<?php
namespace App\Repositories;

Interface ConstantRepository
{    
    public function getAllConstant();
    public function save($key, $data);
    public function getByLang(string $code);
} 
