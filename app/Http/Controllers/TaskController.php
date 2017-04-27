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
         $this->validate($request, ['title' => 'required|max:255',
                                    'content' => 'required|max:255',
                        ]);

         $task = new Task(['title' => $request->title,
                          'content'=> $request->content,  
                          ]);
         //$title = $request->title;
         //echo $title;

         auth()->user()->tasks()->save($task);
         //$request->user()->tasks()->create(['title' => $request->title]); For studying purposes
         $request->session()->flash('alert-success', ' Task was successful added!');

        return redirect('/index');
    }

    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect('/view');
    }
    public function upstatus(Request $request, Task $task)
    {
        $buff = task::find($task);

        $buff->status = $request->status;

        $buff->save();

        return redirect('/view');
    }

    public function editPage(Task $task)
    {
        return view('tasks.edit')->with('task', $task);
    }

    public function updateTask(Request $request, Task $task)
    {
        $buff = task::find($task);

        $buff->title = $request->title;

        $buff->content = $request->content;

        $buff->save();

        return redirect('/view');

    }
}
