@extends('template.frontend.main')
@section('content')
<link rel="stylesheet" href="{{ asset('profile/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('temp/css') }}/style.css">
<link rel="stylesheet" href="{{ asset('temp/css/styles.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
   .social-media-links a {
       margin: 0 10px;
       font-size: 2rem;
       color: #000;
       text-decoration: none;
   }

   .social-media-links a:hover {
       color: #007bff;
   }
</style>

<section id="profil-page">
    <div class="back-to-top"></div>
    <div class="header-profil">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <div class="row w-100">
                <div class="col-md-12 wow fadeInLeft text-center">
                    @if($data_aboutus)
                        <h1 class="mb-4">{{ $data_aboutus->first()->nama }}</h1>
                        <p class="text-lg text-white mb-5">{{ $data_aboutus->first()->sub_judul }}</p>
                    @else
                        <h1 class="mb-4">Judul Tidak Tersedia</h1>
                        <p class="text-lg text-white mb-5">Keterangan tidak tersedia</p>
                    @endif
					<div>
						@php
							// Format nomor telepon menjadi format internasional jika belum
							$no = '62' . ltrim($data_aboutus->first()->no_telpon, '0');
						@endphp
						<a class="btn btn-dark" href="https://wa.me/{{ $no }}" target="_blank">Hubungi Kami</a>
					</div>
					
                </div>
                <a href="#about" data-role="smoothscroll" class="scroll-down text-white d-flex flex-column align-items-center" style="z-index: 1; position: absolute; left: 50%; bottom:10px; transform: translateX(-50%); text-decoration: none; color: inherit;">Scroll Down <i class="fa-solid fa-chevron-down"></i></a>
            </div>
        </div>
    </div>
    <div class="body-profil">
        <div class="page-section" id="about" style="background: #f9f9f9;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <span class="subhead">Tentang Kami</span>
                        <h2 class="title-section">History Of Sidajaya</h2>
                        <div class="divider"></div>
                        <p class="text-justify">{{ $data_aboutus->first()->keterangan ?? 'Keterangan tidak tersedia' }}</p>
                        <p class="text-justify">{{ $data_aboutus->first()->ket_wilayah ?? 'Keterangan tidak tersedia' }}</p>
                    </div>
                    <div class="col-lg-6 py-3 wow fadeInRight">
                        <div class="img-fluid py-3 text-center">
                            <img src="{{ asset('upload/' . $data_aboutus->first()->peta) }}" style="width:50%;" alt="Peta Desa Sidajaya">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="wow fadeInUp">
                        <h2 class="title-section">Visi & Misi</h2>
                        <h5 class="text-secondary">VISI</h5>
                        <div class="divider"></div>
                        <div>{{ $data_aboutus->first()->visi ?? 'Visi tidak tersedia' }}</div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="wow fadeInUp">
                        <h5 class="text-secondary">MISI</h5>
                        <div class="divider"></div>
                        <div>
							@foreach(explode("\n", $data_aboutus->first()->misi ?? 'Misi tidak tersedia') as $misi)
								<p>{{ $misi }}</p>
							@endforeach
						</div>
						</div>
                </div>
            </div>
        </div>

        <div class="page-section" id="about" style="background: #f9f9f9;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <h2 class="title-section">Monografi Desa Sidajaya</h2>
                        <div class="divider"></div>
                        <p class="text-justify">{{ $data_aboutus->first()->monografi ?? 'Monografi tidak tersedia' }}</p>
                    </div>
                    <div class="col-lg-6 py-3 wow fadeInRight">
                        <div class="img-fluid py-3 text-center">
                            <img src="{{ asset('upload/' . $data_aboutus->first()->gambar_monografi) }}" style="width:100%;" alt="Monografi Desa Sidajaya">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="page-section" style="background: #f9f9f9;">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <h2 class="title-section">Struktur Pemerintahan</h2>
            </div>
            <div class="row">
                <img src="{{ asset('upload/' . $data_aboutus->first()->gambar_struktur) }}" class="ml-3" alt="Struktur Pemerintahan">
            </div>
        </div>
    </div>

    <div class="page-section" style="background: #fff;margin-bottom:100px;">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <h2 class="title-section">Hubungi Kami</h2>
                <div class="social-media-links">
                    <a href="{{ $data_aboutus->first()->link_wa ?? '#' }}" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="{{ $data_aboutus->first()->link_ig ?? '#' }}" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="{{ $data_aboutus->first()->link_fb ?? '#' }}" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('profile/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('profile/js/google-maps.js') }}"></script>
<script src="{{ asset('profile/vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('profile/js/theme.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
@endsection
