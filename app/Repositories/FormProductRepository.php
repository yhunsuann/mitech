<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RegisterPartnersRepository.
 *
 * @package namespace App\Repositories;
 */
interface FormProductRepository extends RepositoryInterface
{
    public function formProducts($data = []);
}
