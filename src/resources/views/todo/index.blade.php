<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    @extends('layouts.base')
    @section('content')
    <div class="row justify-content-center">
      <div class="col-md-8">
        <p class="text-left">
          <a class="btn btn-success" href="{{ route('todo.create') }}">ToDoを追加</a>
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
</body>

</html>