@extends('layouts.app')

@section('content')

  <div class="panel-body">
    @include('common.errors')
     <form action="{{ url('task') }}" method="post" class="form-horizontal">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="task"  class="col-sm-3">タスク</label>
        <div class="col-sm-6">
          <input type="text" name="name" id="task-name" class="form-control">
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-3 col-sm-6">
          <button type="submit" class="btn btn-defalut">
            <i class="fa fa-plus"></i> タスク追加
          </button>
        </div>
      </div>
    </form>
  </div>
  
  @if(count($tasks) > 0)
    <div class="panel panel-defalut">
      <div class="panel-heading">現在のタスク</div>
      <div class="panel-body">
        <table class="table tablestriped task-table">
          <thead>
            <th>Task</th>
            <th>&nbsp;</th>
          </thead>
          
          <tbody>
            @foreach($tasks as $task)
              <tr>
                <td class="table-text"><div>{{ $task->name }}</div></td>
                <td>
                  <form action="{{ url('task',$task->id) }} " method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete')}}
                    <button type="submit" class="btn btn-danger">
                      <i class="fa fa-trash"></i>削除
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
@endsection