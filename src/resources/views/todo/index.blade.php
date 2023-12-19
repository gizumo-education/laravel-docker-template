@extends('layouts.base')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <p class="text-left">
      <a class="btn btn-success" href="/todo/create">ToDoを追加</a>
    </p>
    <div class="card">
      <div class="card-header">
        ToDo一覧
      </div>
      <div class="list-group list-group-flush">
        @foreach ($todos as $todo)
        <div class="d-flex">
          <a href="{{ route('todo.show', $todo->id) }}" class="list-group-item list-group-item-action">
            {{ $todo->content }}
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection