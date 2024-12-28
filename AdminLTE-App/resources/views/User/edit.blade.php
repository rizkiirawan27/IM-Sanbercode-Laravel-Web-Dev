@extends('layouts.master')

@section('title')
    Setting Profile
@endsection

@section('content')
  @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

<form id="profileForm" action="{{ route('user.update') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Name</label>
        <input type="name" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}">
      </div>
      <div class="form-group col-md-6">
        <label>Password</label>
        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
          @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}">
      </div>
      <div class="form-group col-md-6">
        <label for="password_confirmation">Retype Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
      </div>
    </div>
    <a href="/films/" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
  </form>
  @push('scripts')
<script>
  document.getElementById('profileForm').addEventListener('submit', function (e) {
    const password = document.getElementById('password').value;
    const passwordConfirmation = document.getElementById('password_confirmation').value;

    if (password !== passwordConfirmation) {
        e.preventDefault(); // Mencegah form dikirim
        alert('Password dan Retype Password tidak sesuai!');
    }
});
</script>
@endpush
@endsection
