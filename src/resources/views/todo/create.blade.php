@extends('layouts.base') <!-- 追記 -->
@section('content') <!-- 追記 -->
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">ToDo作成</div>
        <div class="card-body">
          <!-- 下記のmethodとactionを自分で追加する -->
          <form method="post" action="{{ route('todo.store') }}">
            @csrf <!-- CSRFのセキュリティ対策を追記 -->
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
@endsection <!-- 追記 -->

<!-- Laravelではフォーム内に@csrfを追記するだけでCSRF対策が完了する -->