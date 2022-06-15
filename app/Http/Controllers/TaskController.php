<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use App\Repositories\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $repository;
    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function taskHome()
    {
        $tasksGroup = $this->repository->allTaskGroupBy('task_level');

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
