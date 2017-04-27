@extends('layouts.app')

@section('content')
@include('common.errors')
<div class = "container">
    <div class ="row">
        <div class ="col-md-offset-3 col-md-6">
            <h1> Edit Task </h1>
            <div class = "panel-body">
                <form action ="{{ url('view/'.$task->id) }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field("PATCH") }}
                    <div class="form-group">
                        <label for="task-title" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-6">
                                <input type="text" name="title" id="task-title" value = "{{ $task->title }}" class="form-control">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="task-content" class="col-sm-3 control-label">Content</label>
                        <div class="col-sm-6">
                             <textarea type="text" name="content" id="task-content"  class="form-control" 
                            style="resize:none;">{{ $task->content }}a</textarea>
                         </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i>Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection