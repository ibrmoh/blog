@extends('layout.app')
 @section('content')

     <div class="col-sm-offset-2 col-sm-8">
         <div class="panel panel-default">
             <div class="panel-heading">
                 New Task
             </div>

             <div class="panel-body">
                 <!-- Display Validation Errors -->
                 <!-- New Task Form -->
                 @if ($errors->any())
                     <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                 @endif
                 <form action="{{ url('tasks/update/' . $task->id) }}" method="POST" class="form-horizontal">
                     {{ csrf_field() }}
                     {{ method_field('put') }}
                     <!-- Task Name -->


                     <div class="form-group">
                         <label for="task-name" class="col-sm-3 control-label">Task</label>

                         <div class="col-sm-6">
                             <input type="text" name="name" id="task-name" class="form-control"
                                 value="{{ $task->name }}">
                         </div>
                     </div>

                     <!-- Update Task Button -->
                     <div class="form-group">
                         <div class="col-sm-offset-3 col-sm-6">
                             <button type="submit" class="btn btn-success">
                                 <i class="fa fa-pencil-square-o"></i>Update
                             </button>

                         </div>
                     </div>
                 </form>
             </div>
         </div>

         <!-- Current Tasks -->
         <div class="panel panel-default">
             <div class="panel-heading">
                 Current Tasks
             </div>

             <div class="panel-body">
                 <table class="table table-striped task-table">
                     <thead>
                         <th>NO.</th>
                         <th>Task</th>
                         <th>&nbsp;</th>
                     </thead>
                     <tbody>
                         @foreach ($tasks as $num => $task)
                             <tr>
                                 <td class="table-text">{{ ++$num }}</td>
                                 <td class="table-text">
                                     <div>{{ $task->name }}</div>
                                 </td>

                                 <!-- Task Delete Button -->
                                 <td>
                                     <form action="{{ '/tasks/delete/' . $task->id }}" method="POST">
                                         {{ csrf_field() }}
                                         {{ method_field('delete') }}
                                         <button type="submit" class="btn btn-danger">
                                             <i class="fa fa-btn fa-trash"></i>Delete
                                         </button>
                                     </form>
                                 </td>
                                 <td>
                                     <form action="{{ '/tasks/edit/' . $task->id }}" method="POST">
                                         @csrf
                                         <button type="submit" class="btn btn-primary ">
                                             <i class="fa fa-pencil-square-o"></i>Eidt
                                         </button>
                                     </form>
                                 </td>
                             </tr>
                         @endforeach

                     </tbody>
                 </table>
             </div>
         </div>
     </div>

 @endsection