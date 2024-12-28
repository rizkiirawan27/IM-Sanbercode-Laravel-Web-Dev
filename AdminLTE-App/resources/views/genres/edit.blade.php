@extends('layouts.master')

@section('headtitle')
    Review-Apps | Edit Genre
@endsection

@section('title')
    Halaman Edit Genres
@endsection

@section('content')
<form action="/genres/{{$genres->id}}" method="POST">
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
    @method('PUT')
      <div class="form-group">
        <label>Name</label>
        <input type="name" name="name" class="form-control" value="{{old('name', $genres->name)}}">
      </div>
        <a href="/genres/" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection