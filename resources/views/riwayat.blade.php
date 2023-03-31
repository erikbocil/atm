@extends('layout.template')
@section('content')
    <h1 class="mt-5">Riwayat Transaksi</h1>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Kepada</th>
                <th scope="col">Sisa Saldo</th>
                <th scope="col">Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayats as $riwayat)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $riwayat->jumlah }}</td>
                    <td>{{ $riwayat->penerima }}</td>
                    <td>{{ $riwayat->saldo }}</td>
                    <td>{{ $riwayat->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $riwayats->links() }}
@endsection
