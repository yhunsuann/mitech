<?php
namespace App\Repositories;

Interface ProductRepository
{    
    public function getList($data = []);
    public function getInfoById(int $id);
    public function getInfoBySlug($slug); 
    public function allRegisterProducts($data = []);
    public function getListByMutipleIds($ids = []);
}
