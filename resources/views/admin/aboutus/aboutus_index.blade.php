@extends('template.backend.mainsuper')
@section('main')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Data About Us</h6>

                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        {{-- <a href="{{route('add-aboutus-wisata')}}" class="btn btn-sm btn-success">Tambah Data</a> --}}
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
                                    <th scope="col">Gmail</th>
                                    <th scope="col">No Telpon</th>
                                    <th scope="col">NAMA Perusahaan</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_aboutus as $data)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $data->nama_aboutus }}</td>
                                        <td>{{ $data->no_telpon }}</td>
                                        <td>{{ $data->nama_perusahaan }}</td>
                                        <td>{{ $data->keterangan }}</td>

                                        <td>
                                            <a href="{{ route('edit-aboutus-wisata', $data->id) }}"
                                                class="btn btn-sm btn-warning">edit</a>
                                            {{-- <a href="{{route('hapus-aboutus-wisata',$data->id)}}" class="btn btn-sm btn-danger">hapus</a> --}}
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
