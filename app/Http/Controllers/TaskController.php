<?php

namespace App\Http\Controllers;

use App\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /* Task Repository Instance */
    protected $tasks;

    /* Creates a new controller instance. */
    public function __construct()
    {
    	$this->middleware('auth');

        $this->tasks = $tasks;
    }

    /* Displays a list of all the user tasks */
    public function index(Request $request)
    {
    	$tasks = $request->user()->tasks()->get();

        return view('tasks.index', [
            'tasks' => $tasks->tasks->forUser($request->user()),
            ]);
    }

    public function store(Request $request)
    {
    	$this->validate($request, ['name' => 'required|max:255']);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }
    //create the task.
}
