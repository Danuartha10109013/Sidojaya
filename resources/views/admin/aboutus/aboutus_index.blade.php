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

                <!-- Projects table -->
                
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatablesSimple" class="table mt-4 table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <b>
                                        <th scope="col" style="min-width: 120px;">No Telpon</th>
                                        <th scope="col" style="min-width: 150px;">Judul</th>
                                        <th scope="col" style="min-width: 150px;">Sub Judul</th>
                                        <th scope="col" style="min-width: 200px;">Keterangan</th>
                                        <th scope="col" style="min-width: 150px;">Visi</th>
                                        <th scope="col" style="min-width: 150px;">Misi</th>
                                        <th scope="col" style="min-width: 120px;">Peta</th>
                                        <th scope="col" style="min-width: 180px;">Keterangan Peta</th>
                                        <th scope="col" style="min-width: 150px;">Monografi</th>
                                        <th scope="col" style="min-width: 150px;">Gambar Monografi</th>
                                        <th scope="col" style="min-width: 150px;">Gambar Struktur</th>
                                        <th scope="col" style="min-width: 150px;">Link WhatsApp</th>
                                        <th scope="col" style="min-width: 150px;">Link Instagram</th>
                                        <th scope="col" style="min-width: 150px;">Link Facebook</th>
                                        <th scope="col" style="min-width: 100px;">AKSI</th>
                                    </b>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($data_aboutus as $data)
                                        <tr>
                                            <td>{{ $data->no_telpon }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->sub_judul }}</td>
                                            <td class="overflow-auto" style="max-height: 100px;">
                                                {{ Str::words($data->keterangan, 10, '...') }}
                                            </td>
                                            <td>{{ $data->visi }}</td>
                                            <td class="overflow-auto" style="max-height: 100px;">
                                                {{ Str::words($data->misi, 10, '...') }}
                                            </td>
                                            <td><img src="{{ asset('upload'.'/' . $data->peta) }}" width="90%" alt="Peta Desa Sidajaya"></td>
                                            
                                            <td class="overflow-auto" style="max-height: 100px;">
                                                {{ Str::words($data->ket_wilayah, 10, '...') }}
                                            </td>
                                            <<td class="overflow-auto" style="max-height: 100px;">
                                                {{ Str::words($data->monografi, 10, '...') }}
                                            </td>
                                            <td><img src="{{ asset('upload'.'/' . $data->gambar_monografi) }}" width="90%" alt="Gambar Monografi"></td>
                                            <td><img src="{{ asset('upload'.'/' . $data->gambar_struktur) }}" width="90%" alt="Gambar Monografi"></td>
                                            
                                            <td>{{ $data->link_wa }}</td>
                                            <td>{{ $data->link_ig }}</td>
                                            <td>{{ $data->link_fb }}</td>
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
