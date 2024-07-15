@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen dropdown role, kolom akses wisata, dan label akses wisata
            var roleDropdown = document.getElementById('role');
            var accesWisataField = document.getElementById('acces_wisata');
            var accesWisataLabel = document.getElementById('acces_wisata_label');
    
            // Sembunyikan kolom akses wisata dan label saat halaman dimuat
            accesWisataField.style.display = 'none';
            accesWisataLabel.style.display = 'none';
    
            // Tambahkan event listener untuk mengubah tampilan kolom akses wisata dan label
            roleDropdown.addEventListener('change', function() {
                // Jika nilai dropdown adalah adminwisata, tampilkan kolom akses wisata dan label
                if (this.value === 'adminwisata') {
                    accesWisataField.style.display = 'block';
                    accesWisataLabel.style.display = 'block';
                } else {
                    // Selain itu, sembunyikan kolom akses wisata dan label
                    accesWisataField.style.display = 'none';
                    accesWisataLabel.style.display = 'none';
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen dropdown role, kolom akses wisata, dan label akses wisata
        var roleDropdown = document.getElementById('role');
        var accesWisataRow = document.getElementById('acces_wisata_row');

        // Tambahkan event listener untuk mengubah tampilan kolom akses wisata dan label
        roleDropdown.addEventListener('change', function() {
            // Jika nilai dropdown adalah adminwisata, tampilkan kolom akses wisata dan label
            if (this.value === 'adminwisata') {
                accesWisataRow.style.display = 'block';
            } else {
                // Selain itu, sembunyikan kolom akses wisata dan label
                accesWisataRow.style.display = 'none';
            }
    });
});

    </script>

    
    
    
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
<div class="container">
    {{-- <li><a href="{{ route('register-admin') }}">Register Admin</a></li> --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <li><a href="{{ route('register-admin') }}">Register Admin</a></li> --}}
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" style="display: none;">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                <input id="role" name="role" type="text" class="form-control" value="pengunjung" readonly>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        

                        
                        <div class="row mb-3" id="acces_wisata_row" style="display: none;">
                            <label for="acces_wisata" id="acces_wisata_label" class="col-md-4 col-form-label text-md-end">{{ __('acces_wisata') }}</label>
                        
                            <div class="col-md-6">
                                <input id="acces_wisata" type="text" class="form-control @error('acces_wisata') is-invalid @enderror" name="acces_wisata" value="{{ old('acces_wisata') }}" autocomplete="acces_wisata">
                        
                                @error('acces_wisata')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            
                            <li><a href="{{ route('register-admin') }}">Register Admin</a></li>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
