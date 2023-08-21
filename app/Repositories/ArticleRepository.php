<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BlogRepository.
 *
 * @package namespace App\Repositories;
 */
interface ArticleRepository extends RepositoryInterface
{
    public function getList($data, $slug);
    public function getInfoById(int $id, $slug);
    public function getInfoBySlug($slug_article, $lug);
    public function getOutstanding($slug);
}
