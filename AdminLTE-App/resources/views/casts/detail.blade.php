@extends('layouts.master')

@section('headtitle')
    Review-Apps | Detail Casts
@endsection

@section('title')
    Halaman Detail Casts
@endsection

@section('content')
    <h1 class="text-primary">{{ $casts->name }}</h1>
    <p>{{ $casts->bio }}</p>

    <a href="/casts" class="btn btn-sm btn-secondary">Kembali</a>
@endsection