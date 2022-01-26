<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Episode;
use App\Models\WatchedEpisode;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index');
    }

    public function index(): \Inertia\Response
    {
        $participants = WatchedEpisode::select(DB::raw("COUNT(DISTINCT(user_id))"))
            ->join('episodes', 'episodes.id', '=', 'watched_episodes.episode_id')
            ->whereColumn('episodes.course_id', 'courses.id')
            ->getQuery();

        $courses = Course::select('courses.*')
            ->selectSub($participants, 'participants')
            ->with('user:id,name')
            ->withCount('episodes')
            ->latest()
            ->get();

        return Inertia::render('Courses/Index', compact('courses'));
    }

    public function show(Course $course): \Inertia\Response
    {
        //We load the episodes
        $course->load('episodes');
        $watched = Auth::user()->episodesWatchedInCourse($course->id)->get();

        return Inertia::render('Courses/Show', compact('course', 'watched'));
    }

    public function store(Request $request)
    {
        $course = Course::create($request->all() + ['user_id' => Auth::id()]);

        foreach ($request->input('episodes') as $episode) {
            $course->episodes()->save(
                new Episode($episode)
            );
        }

        return redirect()->route('dashboard')->with('success', 'The formation was successfully created!');
    }

    public function toggleProgress(Request $request)
    {
        //Make sure this episode exist
        $episode = Episode::find(intval($request->input('episodeId', 0)));

        if ($episode != false) {
            Auth::user()->episodesWatched()->toggle($episode);
        }
    }
}
