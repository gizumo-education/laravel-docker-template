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
      @extends('layouts.base')
      @section('content')
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">ToDo作成</div>
              <div class="card-body">
                <form method="POST" action="{{ route('todo.store') }}">
                  @csrf
                  <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">ToDo入力</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="content" value="">
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">作成</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endsection
      </div>
    </main>
  </div>
</body>
</html>