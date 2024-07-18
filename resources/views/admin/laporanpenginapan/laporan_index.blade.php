@extends('template.backend.main')
@section('main')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Laporan Penginapan Wisata</h6>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        {{-- <a href="{{route('add-tiket-wisata')}}" class="btn btn-sm btn-success">Tambah Data</a> --}}
                        <a href="{{ route('cetak-penginapan') }}" class="btn btn-sm btn-success">Cetak Laporan</a>

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
                                    <th scope="col">Nama Pemesan</th>
                                    <th scope="col">jumlah Hari</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Total Bayar</th>
                                    {{-- <th scope="col">Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_reservasi as $data)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->jumlah_hari }}</td>
                                        <td>{{ $data->tanggal }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->total_bayar }}</td>
                                        {{-- <td>{{$data->nama_perusahaan}}</td>
                    <td>{{$data->keterangan}}</td> --}}

                                        <td>
                                            {{-- <a href="{{route('edit-tiket-wisata',$data->id)}}" class="btn btn-sm btn-warning">edit</a>
                     <a href="{{route('del-tiket-wisata',$data->id)}}" class="btn btn-sm btn-danger">hapus</a> --}}
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
