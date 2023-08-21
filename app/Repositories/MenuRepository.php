<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BlogRepository.
 *
 * @package namespace App\Repositories;
 */
interface MenuRepository extends RepositoryInterface
{
    public function getList($locale);
    public function getSlug($slug);
}