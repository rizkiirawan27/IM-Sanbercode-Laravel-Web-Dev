@extends('layouts.master')

@section('headtitle')
    Review-Apps | Detail Film
@endsection

@section('title')
    Halaman Detail Film
@endsection

@section('content')
    <style>
        #scrollspy-container {
            position: relative;
            overflow-y: auto;
            height: 400px;
        }
    </style>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">{{$films->title}} ({{$films->release_year}})</li>
        </ol>
    </nav>
    <form action="/reviews/{{$films->id}}" method="POST">
        <div class="row">
            <nav id="navbar-example3" class="col-md-3">
                <img src="{{asset('uploads/' . $films->poster)}}" alt="..." class="card-img-top">
            </nav>
            <div id="scrollspy-container" data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-offset="0" class="scrollspy-example col-md-9">
                <p>{{$films->summary}}</p>
            </div>
        </div>
    </form>
        <hr>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Reviews</li>
            </ol>
        </nav>
            @forelse ( $films->listReviews as $item )
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span>{{$item->createdBy->name}}</span>
                        <span class="ml-auto">{{$item->created_at->format('d M Y, H:i')}}</span>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{$item->content}}</p>
                            <footer class="blockquote-footer">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $item->point)
                                        ★
                                    @else
                                        ☆
                                    @endif
                                @endfor
                            </footer>
                        </blockquote>
                    </div>
                </div>
            @empty
                <h5>Belum ada review</h5>
            @endforelse

            @auth
                <form action="/reviews/{{$films->id}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <textarea name="content" class="form-control" placeholder="Isi Reviews" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="point">Rating :</label>
                            <select class="col-md-12" name="point" id="rating" required>
                                <option value="1">1 - ★☆☆☆☆</option>
                                <option value="2">2 - ★★☆☆☆</option>
                                <option value="3">3 - ★★★☆☆</option>
                                <option value="4">4 - ★★★★☆</option>
                                <option value="5">5 - ★★★★★</option>
                            </select>
                        </div>
                    </div>
            @endauth
                    <a href="/films/" class="btn btn-secondary">Kembali</a>
            @auth
                <button type="submit" class="btn btn-primary">Submit</button>
                
            @endauth
                </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                var scrollSpy = new bootstrap.ScrollSpy(document.getElementById('scrollspy-container'), {
                target: '#navbar-example3'
                });
            </script>
@endsection