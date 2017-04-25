
@extends('layouts.app')

@section('content')

    <div class ="panel-body">

       @include('common.errors')

       <form action ="{{ url('task') }}" method="POST" class="form-horizontal">
           {{ csrf_field() }}

           <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
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
               <div class="container">
                   <div class="row">
                       <div class ="col-md-offset-3 col-md-6">
                           <div class="alert alert-success" id = "this" >
                               <p class="alert alert-{{ $msg }}" id ="this2">{{ Session::get('alert-' . $msg) }}</p>
                           </div>
                       </div>
                   </div>
                </div>
     <!--  <script>
      $(document).ready(function(){
                    setTimeout(function() {
            $('#this2').fadeOut('fast');
            }, 2000);
        });
        </script> -->
          @endif
        @endforeach        
    </div>
    <!-- TODO: Current Tasks -->
@endsection
