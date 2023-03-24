@extends('layouts.app')

@section('title', 'Form Barang')

@section('contents')
  <form action="{{ isset($barang) ? route('barang.tambah.updateBarang', $barang->id) : route('barang.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($barang) ? 'Form Edit Barang' : 'Form Tambah Barang' }}</h6>
          </div>
          <div class="card-body">

            <div class="form-group">
              <label for="product_name">Nama Barang</label>
              <input type="text" class="form-control" id="product_name" name="product_name" value="{{ isset($barang) ? $barang->product_name : '' }}">
            </div>

            <div class="form-group">
              <label for="product_description">Deskripsi Barang</label>
              <input type="text" class="form-control" id="product_description" name="product_description" value="{{ isset($barang) ? $barang->product_description : '' }}">
            </div>

            @if (isset($barang))
              <div class="form-group">
                <label>Gambar Yang Sudah Ada</label> 
                <br>
                <img src="{{ asset('img/'.$barang->photo) }}"  style="width: 20%" >
              </div>
            @endif


            <div class="form-group">
              <label>Foto</label>
              <input name = "photo" class="form-control" type="file" >
            </div>
    
            <div class="form-group">
              <label for="id_category">Kategori Barang</label>
							<select name="id_category" id="id_category" class="custom-select">
								<option value="" selected disabled hidden>-- Pilih Kategori --</option>
								@foreach ($kategori as $row)
									<option value="{{ $row->id }}" {{ isset($barang) ? ($barang->id_category == $row->id ? 'selected' : '') : '' }}>{{ $row->name }}</option>
								@endforeach
							</select>
            </div>

            <div class="form-group">
              <label for="harga">Harga Barang</label>
              <input type="number" class="form-control" id="price" name="price" value="{{ isset($barang) ? $barang->price : '' }}">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('barang') }}" class="btn btn-primary">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
