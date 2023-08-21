<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ReplacementRepository.
 *
 * @package namespace App\Repositories;
 */
interface FormReplacementRepository extends RepositoryInterface
{
    public function getAllFormReplacement($data = []);
}
