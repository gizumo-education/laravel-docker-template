@extends('layouts.base')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">ToDo編集</div>
      <div class="card-body">
        <form method="POST" action="{{ route('todo.update', $todo->id) }}"> <!--更新ボタンをクリックしたら、action属性で指定したルートにリクエストが送信 -->
          @csrf
          @method('PUT') <!--PUTメソッドでリクエストを送信 (<input type="hidden" name="_method" value="PUT">) -->
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">ToDo入力</label>
            <div class="col-md-6">
              <input type="text" class="form-control @if($errors->has('content')) border-danger @endif" name="content" value="{{ $todo->content }}">
              @if($errors->has('content'))
                <span class="text-danger">{{ $errors->first('content') }}</span>
              @endif
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">更新</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

<!-- $errorsはMessageBagクラスのインスタンスが代入されており、発生したバリデーションエラーの情報を持っています。
$errors->has('入力欄のname属性')で、その入力欄でバリデーションエラーが発生しているか判定します。
$errors->first('入力欄のname属性')で、その入力欄で最初に発生したエラーメッセージを出力しています。 -->