@extends('layouts.base'){{-- 継承する親Bladeを指定 --}}
@section('content') {{-- @yield('content')に挿入 --}}
  <div class="row justify-content-center">
    <div class="col-md-8">
      <p class="text-left">
        <a class="btn btn-success" href="{{ route('todo.create') }}">ToDoを追加</a>
        {{-- web.phpと同じルート名からそのルートで設定したURLを生成する。返り値はURL --}}
      </p>
      <div class="card">
      <div class="card-header">
        ToDo一覧
      </div>
      <div class="list-group list-group-flush">
        {{-- controllerで取得した連想配列を表示 --}}
        @foreach ($todos as $todo) {{-- phpのforeachを簡略化--}}
          <div class="d-flex align-items-center p-2">
            <span class="col-9">{{ $todo->content }}</span>{{-- todosテーブルのレコードのcontentカラムを取得 --}}
            <a href="{{ route('todo.show', $todo->id) }}" class="btn btn-info ml-3">詳細</a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
      