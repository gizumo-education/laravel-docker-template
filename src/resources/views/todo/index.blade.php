    <!-- todo/index.blade.php ＝ 家の中に置く家具 -->
     <!-- 共通のレイアウトを使う -->
    <!-- 共通レイアウトを親として利用する -->
    @extends('layouts.base')
    <!-- ここから、この画面独自の内容を書きます。 -->
        @section('content')
        <div class="row justify-content-center">
          <div class="col-md-8">
            <p class="text-left">
          <a class="btn btn-success"  href="{{ route('todo.create') }}">ToDoを追加</a>
        </p>
            <div class="card">
              <div class="card-header">
                ToDo一覧
              </div>
              <div class="list-group list-group-flush">
                <!-- データベースから取得したToDoを1件ずつ表示する重要な部分 -->
                @foreach ($todos as $todo)
                  <div class="d-flex align-items-center p-2">
                    <!-- チュウかっこ：取得したURLをHTMLに出力する　ボタンを押すと/todo/create に移動し、TodoController の create() が実行 -->
                      <!-- content という項目を取り出して画面に表示 -->
                    <span class="col-9">{{ $todo->content }}</span>
                     <a href="{{ route('todo.show', $todo->id) }}" class="btn btn-info ml-3">詳細</a>
                  </div>
                  <!-- セクションの定義を終了する -->
                @endforeach
              </div>
            </div>
          </div>
        </div>
        @endsection