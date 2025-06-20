@extends('layouts.base')
@section('content')
        <div class="row justify-content-center">
          <div class="col-md-8">
            <p class="text-left">
              <!-- ボタンクリック後、新規作成画面表示のためのルート指定 -->
              <a class="btn btn-success" href="{{ route('todo.create') }}">ToDoを追加</a>
            </p>
            <div class="card">
              <div class="card-header">
                ToDo一覧
              </div>
              <div class="list-group list-group-flush">
                <!-- 'content'カラムのデータ抽出とその表示 -->
                @foreach ($todos as $todo)
                  <div class="d-flex align-items-center p-2">
                    <span class="col-9">{{ $todo->content }}</span>
                  </div>
                  <a href="" class="btn btn-info ml-3">詳細</a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
@endsection