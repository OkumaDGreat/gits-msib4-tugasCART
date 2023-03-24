@extends('layouts.app')

@section('title', 'Data Keranjang')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Keranjang</h6>
    </div>
    <div class="card-body">	
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Total Harga</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($data as $row)
              <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $row->products->product_name }}</td>
                <td>{{ $row->qty }}</td>
                <td>{{ $row->subtotal }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
