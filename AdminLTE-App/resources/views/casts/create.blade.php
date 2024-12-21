@extends('layouts.master')

@section('title')
    Halaman Create Casts
@endsection

@section('content')
<form action="/casts" method="POST">
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
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection