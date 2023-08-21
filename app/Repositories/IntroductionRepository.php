<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface IntroductionRepository.
 *
 * @package namespace App\Repositories;
 */
interface IntroductionRepository extends RepositoryInterface
{
    public function getItem();
    public function getInfo();
}
