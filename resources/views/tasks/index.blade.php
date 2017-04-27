
@extends('layouts.app')

@section('content')
<div class = "container">
    <div class = "row">
        <div class ="col-md-offset-3 col-md-6">
    <div class ="panel-body">

       @include('common.errors')

       <form action ="{{ url('task') }}" method="POST" class="form-horizontal">
           {{ csrf_field() }}

           <div class="form-group">
                <label for="task-title" class="col-sm-3 control-label">Title</label>

                <div class="col-sm-6">
                    <input type="text" name="title" id="task-title" class="form-control">
                </div>

            </div>
            <div class="form-group">
                <label for="task-content" class="col-sm-3 control-label">Content</label>
                     <div class="col-sm-6">
                         <textarea type="text" name="content" id="task-content" class="form-control" 
                         style="resize:none;"> 
                         </textarea>
                     </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>Add Task
                    </button>
                </div>
            </div>
       </form> 
       @foreach (['danger', 'warning', 'success', 'info'] as $msg)
           @if(Session::has('alert-' . $msg))
                <div class="alert alert-success" id = "this" >
                    <p class="alert alert-{{ $msg }}" id ="this2">{{ Session::get('alert-' . $msg) }}</p>
                </div>
            @endif
        @endforeach        
@endsection
