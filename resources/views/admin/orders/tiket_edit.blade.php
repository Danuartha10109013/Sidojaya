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
              <h3 class="mb-0">Edit Data Tiket</h3>
            </div>
            <div class="col-4 text-right"></div>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('tiket-update', $data_tiket->id) }}" method="post">
            @csrf
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-tiket">Nama Tiket Wisata</label>
                    <input type="text" class="form-control" id="input-tiket" name="nama_tiket" value="{{ $data_tiket->nama_tiket }}" required>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="input-harga">Harga Tiket</label>
                    <input type="number" class="form-control" id="input-harga" name="harga" value="{{ $data_tiket->harga }}" required>
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary">SIMPAN DATA</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
