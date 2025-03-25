@extends('layouts.base')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        Todo詳細
      </div>
      <div class="card-body">
        <div class="card-title">{{ $todo->content }}</div>
        <div class="card-text">作成日時:{{ $todo->created_at }}</div>
      </div>
    </div>
  </div>
</div>
@endsection