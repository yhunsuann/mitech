<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RegisterPartnersRepository.
 *
 * @package namespace App\Repositories;
 */
interface FormDistributorRepository extends RepositoryInterface
{
    public function formDistributors($data = []);
}
