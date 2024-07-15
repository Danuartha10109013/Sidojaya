@extends('template.backend.main')
@section('main')
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7"></div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Tambah Data Penginapan Wisata</h3>
            </div>
            <div class="col-4 text-right"></div>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('penginapan-store') }}" method="post">
            @csrf
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Masukan Jenis Penginapan</label>
                    <input type="text" class="form-control" name="nama_penginapan" placeholder="Masukan Nama Penginapan ...." required>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="input-harga">Masukan harga penginapan</label>
                    <input type="number" class="form-control" name="harga" placeholder="Masukan Harga ...." required>
                    <input type="number" class="form-control" name="id_wisata" value="{{ $wisata->id }}" hidden readonly>
                  </div>
                  
                    {{-- <label for="id_wisata">id_wisata:</label> --}}
              </div>
              <button type="submit" class="btn btn-sm btn-primary">SIMPAN DATA</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
