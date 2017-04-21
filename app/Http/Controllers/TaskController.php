<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	return view('tasks.index');
    }

    public function store(Request $request)
    {
    	$this->validate($request, ['name' => 'required|max:255']);
    }
    //create the task.
}