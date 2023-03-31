@extends('layout.template')
@section('content')
    <div class="d-flex align-items-center justify-content-center" style="height :30rem">
        <form action="/login" method="post">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id_pengguna" id="id">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">PIN</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection
