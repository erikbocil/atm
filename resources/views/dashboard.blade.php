@extends('layout.template')
@section('content')
    <h3 class="mt-5">Saldo Anda Sisa Rp {{ number_format(auth()->user()->saldo, 0, '', '.') }}</h3>
    <a href="{{ route('tambah') }}" class="btn btn-secondary"> Tambah Uang</a>
    <div class="row mt-5">
        <div class="col-6">
            <h3>Tarik Dana</h3>
            <form action="{{ route('tarik.dana') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="penarikan" class="form-label">Jumlah Penarikan</label>
                    <input type="number" id="penarikan" name="penarikan" class="form-control">
                    @error('penarikan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tarik Dana</button>
            </form>
        </div>
        <div class="col-6">
            <h3>Transfer Dana</h3>
            <form action="{{ route('transfer.dana') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="id_pengguna" class="form-label">Id Tujuan</label>
                    <input type="text" id="id_pengguna" name="id_pengguna" class="form-control">
                    @error('id_pengguna')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" id="jumlah" name="jumlah" class="form-control">
                    @error('jumlah')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Transfer Dana</button>
            </form>
        </div>
    </div>
@endsection
