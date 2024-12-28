@extends('layouts.master')
@section('headtitle')
    Review-Apps | List Casts
@endsection

@section('title')
    Halaman Cast 
    <a href="/casts/create" class="btn btn-sm btn-primary mx-2">Tambah <i class="fas fa-plus-circle"></i></a>
@endsection

@section('content')

    <table id="example1" class="table table-striped">
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
                    <a href ="/casts/{{$item->id}}" class="btn btn-sm btn-info">Detail <i class="fas fa-info-circle"></i></a>
                    <a href ="/casts/{{$item->id}}/edit" class="btn btn-sm btn-warning">Edit <i class="fas fa-edit"></i></a>
                    <button type="submit" class="btn btn-sm btn-danger">Delete <i class="fas fa-trash"></i></button>
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
@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
@endpush

@push('scripts')
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endpush