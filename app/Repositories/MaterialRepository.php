<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface MaterialRepository.
 *
 * @package namespace App\Repositories;
 */
interface MaterialRepository extends RepositoryInterface
{
    public function getPaginate($data = []);
    public function getDatas();
}
