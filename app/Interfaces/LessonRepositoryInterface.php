<?php namespace App\Interfaces;

interface LessonRepositoryInterface extends RepositoryInterface
{
    public function filter($filters);
}