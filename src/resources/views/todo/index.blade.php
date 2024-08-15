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
  <!-- bladeファイルはテンプレートエンジンの一つで、HTMLに比べて簡単に様々な機能を実施 -->
  <!-- 追加 -->
  <!-- dd($helloWorld) -->

  <!-- 追加 -->
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="/todo">ToDo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto"></ul>
          <ul class="navbar-nav ml-auto"></ul>
        </div>
      </div>
    </nav>
    <main class="py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <p class="text-left">
              <!-- href属性にURL追記 -->
              <a class="btn btn-success" href="http://localhost:8080/todo/create">ToDoを追加</a>
            </p>
            <div class="card">
              <div class="card-header">
                ToDo一覧
              </div>
              <div class="list-group list-group-flush"></div>
              @foreach ($todos as $todo)
              <div class="d-flex align-items-center p-2">
                <span class="col-9">{{ $todo->content }}</span>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>

</html>