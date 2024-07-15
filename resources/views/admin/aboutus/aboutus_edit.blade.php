@extends('template.backend.mainsuper')
@section('main')
 <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit Data Aboutus</h3>
                </div>
                <div class="col-4 text-right">
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="{{route('aboutus-update',$data_aboutus->id)}}" method="post"> 
                @csrf
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        {{-- <label class="form-control-label">Wisata</label> --}}
                        {{-- <select class="form-control" name="id_wisata">
                            <option value="">-- Pilih Kategori Wisata --</option>
                            @foreach ($wisata as $data_wisata)
                                <option value="{{ $data_wisata->id }}" {{$data_wisata->id == $data_event->id_wisata  ? 'selected' : ''}}>
                                    {{ $data_wisata->nama_wisata }}
                                </option>
                            @endforeach
                        </select> --}}
                        <div class="form-group">
                          <label class="form-control-label" for="input-gmail">Gmail</label>
                          <input type="email" class="form-control" id="input-gmail" name="nama_aboutus" value="{{$data_aboutus->nama_aboutus}}" required>
                        </div>
                        <div class="form-group">
                          <label class="form-control-label" for="input-no-telpon">No Telpon</label>
                          <input type="tel" class="form-control" id="input-no-telpon" name="no_telpon" value="{{$data_aboutus->no_telpon}}" pattern="[0-9]{1,12}" maxlength="12" required>
                        </div>
                        <div class="form-group">
                          <label class="form-control-label" for="input-nama-perusahaan">Nama Perusahaan</label>
                          <input type="text" class="form-control" id="input-nama-perusahaan" name="nama_perusahaan" value="{{$data_aboutus->nama_perusahaan}}" required>
                        </div>
                        <div class="form-group">
                          <label class="form-control-label" for="input-keterangan">Keterangan</label>
                          <textarea id="input-keterangan" name="keterangan" rows="3" class="form-control" placeholder="Masukan Keterangan Lengkap">{{$data_aboutus->keterangan}}</textarea>
                        </div>
                    
                    </div>
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary">SIMPAN DATA</button>      
                </div>   
            </div>
          </div>
        </div>
      </div>
@endsection
