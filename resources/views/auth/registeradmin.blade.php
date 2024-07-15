@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>PORTAL WISATA KALBAR | ADMIN</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ url('backend/assets/img/brand/favicon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ url('backend/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ url('backend/assets/css/argon.css?v=1.2.0') }}" type="text/css">
</head>
<body>

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
                            <h3 class="mb-0">Register Admin Wisata</h3>
                        </div>
                        <div class="col-4 text-right">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('register-store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">Informasi Dasar Wisata</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Nama</label>
                                        <input type="text" class="form-control" name="name" placeholder="Masukan Nama ...." value="{{ old('name') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Gmail</label>
                                        <input type="email" class="form-control" name="email" placeholder="Masukan Gmail ...." value="{{ old('email') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Masukan Password ...." required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Masukan Password ...." required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Nama Wisata</label>
                                        <input type="text" class="form-control" name="nama_wisata" placeholder="Masukan Nama Wisata ...." value="{{ old('nama_wisata') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Kategori Wisata</label>
                                        <select class="form-control" name="id_kategori" required>
                                            <option value="">-- Pilih Kategori Wisata --</option>
                                            @foreach ($kategori_wisata as $data_kategori)
                                                <option value="{{ $data_kategori->id }}" {{ old('id_kategori') == $data_kategori->id ? 'selected' : '' }}>
                                                    {{ $loop->iteration }}. {{ $data_kategori->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Harga Tiket</label>
                                        <input type="text" class="form-control" name="harga_tiket" placeholder="Masukan Harga Tiket ...." value="{{ old('harga_tiket') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Alamat</label>
                                        <textarea name="alamat" rows="3" class="form-control" placeholder="Masukan Alamat Lengkap" required>{{ old('alamat') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Google MAPS Kordinat</label>
                                        <input type="text" class="form-control" name="gmaps" placeholder="Tempel Kordinat Maps" value="{{ old('gmaps') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Deskripsi</label>
                                        <textarea rows="4" class="form-control" name="deskripsi" placeholder="Masukan Deskripsi Wisata ..." required>{{ old('deskripsi') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Kontak Pengelola</label>
                                        <input class="form-control" placeholder="Masukan No Telephone Pengelola" type="text" maxlength="13" name="kontak_pengelola" value="{{ old('kontak_pengelola') }}" required>
                                    </div>
                                    <div class="form-group">
                                        {{-- <label class="form-control-label">id User</label> --}}
                                        <input class="form-control" placeholder="Masukan No Telephone Pengelola" type="text" maxlength="13" name="id_user" value="{{$id}}" hidden readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Bukti Lampiran Pengelola</label>
                                        <input class="form-control" type="file" accept=".pdf, .doc, .docx" name="bukti_pengelola" required>
                                    </div>                                
                                    <div class="form-group">
                                        <label class="form-control-label">Fasilitas Umum</label>
                                        @foreach ($fasilitas_wisata as $data_fasilitas)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $data_fasilitas->nama_fasilitas }}" name="fasilitas[]" {{ in_array($data_fasilitas->nama_fasilitas, old('fasilitas', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label">
                                                    {{ $data_fasilitas->nama_fasilitas }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">SIMPAN DATA</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
