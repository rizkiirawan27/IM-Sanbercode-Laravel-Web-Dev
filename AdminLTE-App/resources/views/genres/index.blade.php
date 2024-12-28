@extends('layouts.master')

@section('headtitle')
    Review-Apps | Genre Film
@endsection

@section('title')
    Halaman Genres
    @auth
        <a href="/genres/create" class="btn btn-sm btn-primary mx-2">Tambah <i class="fas fa-plus-circle"></i></a>
    @endauth
@endsection

@section('content')
    @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
    @elseif (session('error'))
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
    @endif
    <div class="row d-flex justify-content-between">
      <div class="col-lg-12 d-flex justify-content-end align-items-center">
          <form action="{{ url('/genres') }}" method="GET" class="form-inline my-3">
              <input type="text" name="search" class="form-control" placeholder="Cari genre..." value="{{ request('search') }}">
              <button type="submit" class="btn btn-primary ml-2">Cari</button>
          </form>
      </div>
    </div>
    @php
        $colors = ['bg-primary', 'bg-success', 'bg-info', 'bg-warning', 'bg-danger', 'bg-dark', 'bg-light'];
    @endphp

    @forelse ($genres as $index => $item)
        @php
            $randomColor = $colors[array_rand($colors)];
        @endphp

        @if ($index % 4 === 0)
            <div class="row">
        @endif

        <div class="col-3">
            <div class="small-box {{ $randomColor }}">
                <div class="inner">
                    <h3>{{ $item->list_films_count }}</h3>
                    <p>{{ $item->name }}</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fa fa-film"></i>
                </div>
                <a href="/genres/{{$item->id}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                <div class="row my-1">
                    @auth
                        <div class="col">
                            <a href="/genres/{{$item->id}}/edit" class="btn btn-info btn-block btn-sm">Edit <i class="fas fa-edit"></i></a>
                        </div>
                        <div class="col">
                            <form action="/genres/{{$item->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-block btn-sm">
                                    Delete <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>          
        </div>

        @if (($index + 1) % 4 === 0 || $loop->last)
            </div>
        @endif
    @empty
        <p class="text-center">Data is empty!</p>
    @endforelse
@endsection