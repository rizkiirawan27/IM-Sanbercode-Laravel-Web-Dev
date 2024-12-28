@extends('layouts.master')

@section('headtitle')
    Review-Apps | Edit Film
@endsection

@section('title')
    Halaman Create Films
@endsection

@section('content')
<form action="/films/{{$films->id}}" method="POST" enctype="multipart/form-data">
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
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Title</label>
        <input type="text" name="title" value="{{$films->title}}" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label>Release Year</label>
        <input type="int" name="release_year" class="form-control" value="{{$films->release_year}}" >
      </div>
      <div class="form-group col-md-6">
        <label>Genre</label>
      <select name="genre_id" class="form-control" id="">
            <option value="">-- Pilih Genre --</option>
            @forelse ( $genres as $item)
            @if ($item->id === $films->genre_id)
                <option value="{{$item->id}}" selected>{{$item->name}}
            @else
                <option value="{{$item->id}}">{{$item->name}}
            @endif
                
            @empty
                <option value="">Tidak ada Data Genre</option>
            @endforelse
      </select>
      </div>
      <div class="form-group col-md-6">
        <label>Poster</label>
        <input type="file" name="poster" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label>Summary</label>
        <textarea type="content" name="summary" class="form-control" rows="10" cols="30">{{$films->summary}}</textarea>
    </div>
    <a href="/films/" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection