<?php namespace App\Repositories;

use App\Repositories\AbstractRepository;
use App\Interfaces\LessonRepositoryInterface;

class LessonRepository extends AbstractRepository implements LessonRepositoryInterface
{
    public function filter($filters)
    {
        return $this->model->get();
    }
}