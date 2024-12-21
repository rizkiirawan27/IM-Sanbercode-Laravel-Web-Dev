@extends('layouts.master')

@section('title')
    Halaman Detail Casts
@endsection

@section('content')
    <h1 class="text-primary">{{ $casts->name }}</h1>
    <p>{{ $casts->bio }}</p>

    <a href="/casts" class="btn btn-sm btn-secondary">Back</a>
@endsection