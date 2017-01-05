<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Filters\LessonFilters;
use App\Http\Requests;

class LessonController extends Controller
{
    public function index(LessonFilters $filters)
    {
        return Lesson::filter($filters)->get();
    }
}
