

@extends('layouts/app')

@section('content')
    <div class="container mt-5">
    <div class="container mt-5">
      
      <h1>Welcome to the Library System</h1>

<div>
  <a href="{{route('bai1Libraries.index')}}">
      <button>Go to Libraries</button>
  </a>
</div>

<div>
  <a href="{{route('bai1Books.index')}}">
      <button>Go to Books</button>
  </a>
</div>
  </div>

    </div>
@endsection










