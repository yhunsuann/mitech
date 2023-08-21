<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BlogRepository.
 *
 * @package namespace App\Repositories;
 */
interface ArticleTranslateRepository extends RepositoryInterface
{
    public function getList($data);
    public function getInfoById(int $id);
}
