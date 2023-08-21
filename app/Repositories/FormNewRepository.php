<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface FormNewRepository.
 *
 * @package namespace App\Repositories;
 */
interface FormNewRepository extends RepositoryInterface
{
    public function getAllFormNew($data = []);
}
