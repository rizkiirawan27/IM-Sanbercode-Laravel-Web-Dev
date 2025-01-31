@extends('layouts.master')

@section('headtitle')
    Review-Apps | Add Casts
@endsection

@section('title')
    Halaman Create Casts
@endsection

@section('content')
<form action="{{route('casts.store')}}" method="POST">
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
        <label>Name</label>
        <input type="name" name="name" class="form-control" value="{{old('name')}}">
      </div>
      <div class="form-group col-md-6">
        <label>Age</label>
        <input type="age" name="age" class="form-control" value="{{old('age')}}">
      </div>
    </div>
    <div class="form-group">
      <label>Bio</label>
      <textarea name="bio" class="form-control"rows="5">{{old('bio')}}</textarea>
    </div>
    <a href="/casts/" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection