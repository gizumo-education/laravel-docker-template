        @extends('layouts.base')
        @section('content')
        <div class="row justify-content-center">
          <div class="col-md-8">
            <p class="text-left">
              <a href="{{ route('todo.create') }}" class="btn btn-success">Todoを追加</a>
            </p>
            <div class="card">
              <div class="card-header">
                ToDo一覧
              </div>
              <div class="list-group list-group-flush">
                @foreach ($todoList as $todo)
                <div class="d-flex align-items-center p-2">
                  <span class="col-9">{{ $todo->content }}</span>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        @endsection