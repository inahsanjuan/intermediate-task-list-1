
@extends('layouts.app')

@section('content')
@include('common.errors')
<div class="container">
  <div class ="row">
    <div class="col-md-offset-3 col-md-6">
        @if (count($tasks) >0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Current Tasks</h3>
                </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead align="center">
                        <th>Task</th>
                        <!-- <th>Content</th> -->
                        <th>Status</th>
                        <th >Operations</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody align ="left">
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="table-text">
                                    <div> 
                                        @if ($task->status == FALSE) 
                                            <b><a href="#" data-toggle ="modal" data-target="#task-{{ $task->id }}" style="text-decoration: none; color:black">      {{ str_limit($task->title, 20) }} </a></b>
                                        @else
                                            <b><a href="#" data-toggle ="modal" data-target="#task-{{ $task->id }}" style ="text-decoration: none; color:black">      <del>{{ str_limit($task->title, 20) }}</del> </a></b>
                                        @endif
                                    </div>
                                </td>
                                <td class="table-text">
                                        <form action ="{{ url ('view/'.$task->id) }}" method = "POST">
                                            {{ csrf_field() }}
                                            {{ method_field("PUT") }}
                                            @if ($task->status == FALSE) 
                                                <button type="submit" name = "status" value = 1 id="status-task-{{ $task->id }}" class="btn btn-warning">

                                               UNFINISHED

                                                </button>   
                                             @else 
                                                <button type="submit" name = "status" value = 0 id="status-task-{{ $task->id }}" class="btn btn-success">
                                                
                                                FINISHED

                                                </button>
                                             @endif
                                        </form>
                                </td>
                                <td align = "left">
                                    <form action ="{{ url ('view/'.$task->id) }}" method = "POST">
                                        {{ csrf_field() }}
                                        {{ method_field("DELETE") }}
                                        
                                        <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                        <i class="fa fa-btn fa-fa-trash"></i>Delete
                                        </button>    
                                    </form>
                                </td>
                                <td>
                                    <form action ="{{ url ('edit/'.$task->id) }}" method = "GET">
                                        {{ csrf_field() }}
                                
                                    <button type="submit" id="update-task-{{ $task->id }}" class="btn btn-info">
                                       <i class="fa fa-btn fa-fa-trash"></i>Update
                                   </button>
                                   
                                    </form>
                                </td>
                            </tr>
                            <div class="modal fade" id="task-{{ $task->id }}" role="dialog" >
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content modal-lg">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 
                                            <h1 class="modal-title" align="center"><b>{{ $task->title }}</b></h1>
                                        </div>
                                        <div class="modal-body modal-sm" align = "center">
                                            <div> {{ $task->content }} </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                   @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
   </div>
</div>
@endsection