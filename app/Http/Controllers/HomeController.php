<?php

namespace App\Http\Controllers;

use App\Models\Task;
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
        $tasksGroup = Task::all()->groupBy('task_level')->sortKeys();
        $tasks = Task::all();
        $taskTotalHours = $tasks->sum('task_time');
        $devBasiDusenToplamSure = round($taskTotalHours/5);

        $developers = [
            'dev1' => 1,
            'dev2' => 2,
            'dev3' => 3,
            'dev4' => 4,
            'dev5' => 5
        ];
        return view('home',compact('tasksGroup','developers'));
    }
}
