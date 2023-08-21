<?php
namespace App\Repositories;

Interface CategoryRepository
{    
    public function allCategories($data = [],  $type = []);
    public function getCategoriesDefault($type = 'product');
    public function getCategories($data = []);
    public function getInfoById(int $id);
    public function getList($data = []);
} 
