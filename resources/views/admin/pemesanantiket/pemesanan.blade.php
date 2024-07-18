@extends('template.backend.main')
@section('main')
 <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Laporan Tiket Wisata</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
              {{-- <a href="{{route('add-tiket-wisata')}}" class="btn btn-sm btn-success">Tambah Data</a> --}}
              <a href="{{ route('cetak-tiket') }}" class="btn btn-sm btn-success">Cetak Tiket </a>

            </div>
          </div>
        </div>  
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          @if (session('success'))
          <div class="alert alert-success ">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
          @if (session('error'))
          <div class="alert alert-error">
              {{ session('error') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
          <div class="card">
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pembeli</th> 
                    <th scope="col">Phone</th>  
                    <th scope="col">Alamat</th>             
                    <th scope="col">Qty</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data_order as $data)
                  
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->qty}}</td>
                    <td>{{$data->total_price}}</td>
                    <td>
                      
                        @if ($data->active == 1)
                        <p>Tiket Sudah Dipakai</p>
                        @else 
                        <form action="{{ url('/dipakai/' . $data->id ) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Proses
                            </button>
                        </form>
                        @endif
  
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection
