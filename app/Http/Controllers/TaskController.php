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
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    /* Displays a list of all the user tasks */
    public function view(Request $request)
    {
        $tasks = $request->user()->tasks()->get();

        return view('tasks.view', [
            'tasks' => $this->tasks->forUser($request->user()), 
        ]);
    }

    public function create(Request $request)
    {
        $tasks = $request->user()->tasks()->get();

        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()), 
        ]);
    }



    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:255']);

        $request->user()->tasks()->create(['name' => $request->name, ]);
         $request->session()->flash('alert-success', ' Task was successful added!');

        return redirect('/index');
    }

    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect('/view');
    }
}
