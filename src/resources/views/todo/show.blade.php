@extends('layouts.base')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        Todo詳細
      </div>
      <div class="card-body">
        <h5 class="card-title">{{ $todo->content }}</h5>
        <p class="card-text">作成日時：{{ $todo->created_at }}</p>
      </div>
    </div>
  </div>
</div>
@endsection