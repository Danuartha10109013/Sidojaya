@extends('template.backend.mainsuper')
@section('main')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Kelola Akun</h6>
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
                        {{ session('error') }}+
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
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Nama Wisata</th>
                                    <th scope="col">Harga Tiket</th>
                                    <th scope="col">Kontak Pengelola</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Fasilitas</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Gmaps</th>
                                    <th scope="col">Bukti Lampiran Pengelola</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_akun as $data)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->password }}</td>
                                        <td>{{ $data->nama_wisata }}</td>
                                        <td>{{ $data->harga_tiket }}</td>
                                        <td>{{ $data->kontak_pengelola }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->fasilitas }}</td>
                                        <td>{{ $data->deskripsi }}</td>
                                        <td>{{ $data->gmaps }}</td>
                                        <td>
                                            <a href="{{ asset('upload/file/' . $data->bukti_pengelola) }}"
                                                target="_blank">{{ $data->bukti_pengelola }}</a>
                                        </td>
                                        <td>
                                            @if ($data->status == 'ya')
                                            @else
                                                <form action="{{ url('/setujui/' . $data->id . '/accept') }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Setujui
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
