<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface SliderRepository.
 *
 * @package namespace App\Repositories;
 */
interface SliderRepository extends RepositoryInterface
{
    public function getList($data);
    public function getInfoById(int $id);
    public function getAll();
}
