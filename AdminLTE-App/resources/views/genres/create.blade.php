@extends('layouts.master')
@section('headtitle')
    Review-Apps | Add Genre
@endsection

@section('title')
    Halaman Create Genres
@endsection

@section('content')
<form action="{{route('genres.store')}}" method="POST">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @csrf
      <div class="form-group">
        <label>Name</label>
        <input type="name" name="name" class="form-control" value="{{old('name')}}">
      </div>
      <a href="/genres/" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection