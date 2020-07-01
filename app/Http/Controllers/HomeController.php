<?php

namespace App\Http\Controllers;
use App\Users;
use App\Activity;
use App\ActivityUpdates;
use Illuminate\Http\Request;

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
        $activities = Activity::with('users')->paginate(5);
        $users = Users::all();
        $updates = ActivityUpdates::all();
        return view('home', compact('activities', 'users', 'updates'));
    }
}
