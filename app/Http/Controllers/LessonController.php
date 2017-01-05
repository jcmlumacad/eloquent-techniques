<?php

namespace App\Http\Controllers;

use App\Interfaces\LessonRepositoryInterface as Lesson;
use App\Filters\LessonFilters;
use App\Http\Requests;

class LessonController extends Controller
{
    public function __construct(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }

    public function index(LessonFilters $filters)
    {
        // return $this->lesson->find(1);
        return $this->lesson->filter($filters);
    }
}
