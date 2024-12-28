@extends('layouts.master')

@section('headtitle')
    Review-Apps | List Film
@endsection

@section('title')
    Popular Movies
    @auth
        <a href="/films/create" class="btn btn-sm btn-primary mx-2">Tambah <i class="fas fa-plus-circle"></i></a>
    @endauth
@endsection

@section('content')
<div class="row d-flex justify-content-end align-items-center">
    <div class="col-lg-12 d-flex justify-content-end align-items-center">
        <form action="{{ url('/films') }}" method="GET" class="form-inline my-3">
            <input type="text" name="search" class="form-control" placeholder="Cari Movie..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary ml-2">Cari</button>
        </form>
    </div>
</div>

<div class="row">
    @forelse ($films as $item )
        <div class="col-3">
            <div class="card">
                <img src="{{asset('uploads/' . $item->poster)}}" class="card-img-top" height="320px" alt="...">
                <div class="card-body">
                    <h5>{{$item->title}} <sub>{{$item->release_year}}</sub></h5> 
                    <div class="d-flex align-items-center">
                        <span class="badge badge-success">{{$item->genres->name}}</span>
                        <p class="text-warning mb-0 ml-2">
                            ★
                            @if ($item->average_rating)
                                {{ number_format($item->average_rating, 1) }} / 5
                            @else
                                Belum ada rating
                            @endif
                        </p>
                    </div>
                    <p class="card-text">{{ Str::limit($item->summary, 50) }}</p>
                    <a href="/films/{{$item->id}}" class="btn btn-secondary btn-block btn-sm">Detail <i class="fas fa-info-circle"></i></a>
                    <div class="row my-2">
                        @auth
                            <div class="col">
                                <a href="/films/{{$item->id}}/edit" class="btn btn-info btn-block btn-sm">Edit  <i class="fas fa-edit"></i></a>
                            </div>
                            <div class="col">
                                <form action="/films/{{$item->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-block btn-sm">
                                        Delete<i class="fas fa-trash ml-2"></i>
                                    </button>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        
    @empty
        <h2>Belum ada Film Terbaru</h2>
    @endforelse
    
</div>

@endsection