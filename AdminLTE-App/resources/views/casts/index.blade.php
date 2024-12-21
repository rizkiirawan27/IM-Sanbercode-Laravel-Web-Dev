@extends('layouts.master')

@section('title')
    Halaman Cast
@endsection

@section('content')
    <a href="/casts/create" class="btn btn-sm btn-primary">Tambah</a>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($casts as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->age }}</td>
                <td>
                    <form action="/casts/{{$item->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href ="/casts/{{$item->id}}" class="btn btn-sm btn-info">Detail</a>
                    <a href ="/casts/{{$item->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
              </tr>
            @empty
                <tr>
                    <th scope="row">Data is empty!</th>
                </tr>
            @endforelse
        </tbody>
      </table>
@endsection