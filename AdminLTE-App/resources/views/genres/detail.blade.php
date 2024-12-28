@extends('layouts.master')

@section('headtitle')
    Review-Apps | Detail Genre
@endsection

@section('title')
    Halaman Detail Genre
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">{{$genres->name}}</li>
        </ol>
    </nav>
    <div class="row">
    @forelse ($genres->listFilms as $item)
        <div class="col-3">
            <div class="card" style="">
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
                    <a href="/films/{{$item->id}}" class="btn btn-secondary btn-block btn-sm">Detail</a>
                    <div class="row my-2">
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h5 class="mx-2">Tidak ada Film di Genre ini</h5>
    @endforelse
    </div>
    <a href="/genres" class="btn btn-secondary btn-sm">Kembali</a>




@endsection