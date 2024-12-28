@extends('layouts.master')

@section('headtitle')
    Review-Apps | Add Film
@endsection

@section('title')
    Halaman Create Film
@endsection

@section('content')
<form action="{{route('films.store')}}" method="POST" enctype="multipart/form-data">
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
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Title</label>
        <input type="text" name="title" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label>Release Year</label>
        <input type="int" name="release_year" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label>Summary</label>
        <textarea type="content" name="summary" class="form-control" rows="10" cols="30"></textarea>
      </div>
      <div class="form-group col-md-6">
        <label>Poster</label>
        <input type="file" name="poster" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label>Genre</label>
      <select name="genre_id" class="form-control" id="">
            <option value="">-- Pilih Genre --</option>
            @forelse ( $genres as $item)
                <option value="{{$item->id}}">{{$item->name}}
            @empty
                <option value="">Tidak ada Data Genre</option>
            @endforelse


      </select>
    </div>
    <a href="/films/" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection