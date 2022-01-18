<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index(): \Inertia\Response
    {
        $courses = Course::with('user:id,name')->withCount('episodes')->get();
        return Inertia::render('Courses/Index', compact('courses'));
    }

    public function show(Course $course)
    {
        //We load the episodes
        $course->load('episodes');

        return Inertia::render('Courses/Show', compact('course'));
    }
}
