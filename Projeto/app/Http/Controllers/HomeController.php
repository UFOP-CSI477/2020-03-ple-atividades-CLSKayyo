<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Adventure;
use App\Models\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $courses = Course::where('user_id', Auth::user()->id)->get();

        $adventures = array();

        foreach ($courses as $course) {
            array_push($adventures, Adventure::find($course->adventure_id));
        }

        return view('home', ['adventures' => $adventures]);
    }
}
