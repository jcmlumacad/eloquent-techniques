<?php namespace App\Interfaces;

use App\Interfaces\RepositoryInterface;

interface LessonRepositoryInterface extends RepositoryInterface
{
    public function filter($filters);
}