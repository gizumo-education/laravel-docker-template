@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @dump($errors->all())
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif