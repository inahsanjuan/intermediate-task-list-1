
@extends('layouts.app')

@section('content')

<div class="container">
<div class ="row">
  <div class="col-md-offset-3 col-md-6">
@if (count($tasks) >0)
       <div class="panel panel-default ">
           <div class="panel-heading">
               <h3>Current Tasks</h3>
           </div>
       <div class="panel-body">
           <table class="table table-striped task-table">
               <thead>
                   <th>Task</th>
                   <th>&nbsp;</th>
               </thead>

               <tbody>
                   @foreach ($tasks as $task)
                       <tr>
                           <td class="table-text" style="overflow:hidden;">
                               <div style="width:20px; overflow-horizontal:scroll;"> {{ $task->name}} </div>
                           </td>
                           <td>
                               <form action ="{{ url ('view/'.$task->id) }}" method = "POST">
                                   {{ csrf_field() }}
                                   {{ method_field("DELETE") }}
                                   <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                       <i class="fa fa-btn fa-fa-trash"></i>Delete
                                   </button>
                                   
                               </form>
                           </td>
                           <td>
                               <form action ="#" method = "POST">
                                   {{ csrf_field() }}
                                  {{ method_field("DELETE") }}
                                   <button type="submit" id="update-task-{{ $task->id }}" class="btn btn-warning">
                                       <i class="fa fa-btn fa-fa-trash"></i>Update
                                   </button>
                                   
                               </form>
                           </td>
                       </tr>
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