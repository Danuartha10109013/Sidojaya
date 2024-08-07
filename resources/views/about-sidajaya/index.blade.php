
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
       color: #007bff; /* Change to your desired hover color */
   }
</style>


<section id="profil-page">
	<div class="back-to-top"></div>
	<div class="header-profil">
		<div class="container h-100 d-flex justify-content-center align-items-center">
			<div class="row w-100">
				<div class="col-md-12 wow fadeInLeft text-center">
					<h1 class="mb-4">Desa Wisata Sidajaya
					</h1>
					<p class="text-lg text-white mb-5">Kami hadir untuk memberikan solusi teknologi <br> yang efisien dan efektif bagi perkembangan bisnis Anda.</p>
					<a href="#" class="btn" style="background: transparent; border:1px solid gray;">

						<div class="d-flex align-items-center text-white">
							HUBUNGI KAMI
							<i class="fa-solid fa-play ms-1" style="font-size: 0.5rem;"></i>
						</div>
					</a>
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

						<p class="text-justify">Menurut penuturan para orang tua terdahulu / serta tokoh-tokoh masyarakat yang dapat dipercaya, bahwa Pemerintah Desa Sidajaya awalnya muasanya adalah Desa Tanjung yang di pecah menjadi Desa Sidamulya pada tahun 1975. Atau biasa di sebut CIGARUKGAK Pada masa belanda masuk ke indonesia
                     Setelah itu kemudian pada tahun 1980 Desa Sidamulya di pecah Kembali menjadi dua Desa yaitu Desa Sidamulya dan Desa Sidajaya pada tahun 1980 sampai dengan tahun 2022.  Kata Sidajaya itu berasal dari  dua kata yaitu SIDA dan JAYA, atau kata orang jawa biasa menyebutnya, JADI JAYA.
                     </p>
						<p class="text-justify">Secara administratif Desa Sidajaya merupakan salah satu dari 10 Desa di Wilayah Kecamatan Cipunagara Kabupaten Subang yang terletak 10 Km ke arah Timur dari Kecamatan Cipunagara. Desa Sidajaya berada di ketinggian 70 mdl diatas permukaan laut dengan wilayah + 1.292,430 Hektar. Desa Sidajaya berbatasan dengan beberapa desa yaitu:
                  </p>
					</div>
					<div class="col-lg-6 py-3 wow fadeInRight">
						<div class="img-fluid py-3 text-center">
							<img src="{{asset('assets')}}/img/Peta Sidajaya.jpg" style="width:50%;" alt="">
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
						<div>VISI: 
                     TERBENTUKYA TATA KELOLA PEMERINTAHAN DESA YANG BERSIH, JUJUR DAN TRANSPARANSI GUNA MEWUJUDKAN DESA SIDAJAYA LEBIH BAIK
                     </div>
					</div>
				</div>
				<div class="row" style="margin-top: 20px;">
					<div class="wow fadeInUp">
						<h5 class="text-secondary">MISI</h5>
						<div class="divider"></div>
						<div>
                     1. MELAKUKAN PEMBENAHAN KINERJA APARATUR PEMERINTAHAN DESA GUNA MENINGKATKAN KUALITAS PELAYAANAN KEPADA MASYARAKAT <br>
                     2. PENINGKATAN PENGELOLAN INFRASTUKTUR PEMBANGUNAN: JALAN DESA, BANGUNAN DESA, JALAN LINGKUNGAN JALAN PERTANIAN SARANA AIR BERSIH SARANA OLAHRAGA KESEHATAN PENDIDIKAN, KEAGAMAAN DAN FASILITAS LAINYA <br>
                     3. MENINGKATKAN PEREKONOMIAN MASYARAKAT MELALUI PEMBRDAYAAN BIDANG PERTANIAN, PETERNAKAN, UKM PARIWISATA DAN PENGUATAN BUMDES <br>
                     4. MENANAMKAN NILAI NILAI RELIGIUS DAN KEARIFAN LOCAL MELALUI PENGAJIAN RUTINAN, PENYELENGGARAAN RUAT BUMI <br>
                     5. PENINGKATAN PELAYAANA KESEHATAN PEMBINAAN KADER POSYANDU PENYULUHAN KESEHATAN MASYARAKAT.
                     </div>
					</div>
				</div>
			</div>
		</div>

		<div class="page-section" id="about" style="background: #f9f9f9;">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 py-3 wow fadeInUp">
						{{-- <span class="subhead">Tentang Kami</span> --}}
						<h2 class="title-section">Monografi Desa Sidajaya</h2>
						<div class="divider"></div>

						<p class="text-justify">Luas Desa		: 1.2902.430 ± Ha <br>
                     Luas Sawah  		: 459.000 ± Ha <br>
                     Luas Daratan 	: 833.430 ± Ha <br>
                     Permukaan Laut 	: 70 MDPL <br>
                     <br>
                     Jarak Dari Desa Ke Kecamatan 	      : 7 Km <br>
                     Jarak Dari Desa Ke Kabupaten	      : 25 Km <br>
                     Jarak Dari Desa Ke Provinsi	      : 83 Km Jarak Dari Desa Ke Ibu Kota Negara : 183 Km <br>
                     
                     </p>
					
					</div>
					<div class="col-lg-6 py-3 wow fadeInRight">
						<div class="img-fluid py-3 text-center">
							<img src="{{asset('assets')}}/img/monografi.jpg" style="width:100%;" alt="">
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
				<img src="{{asset('assets')}}/img/Struktur-Sidajaya.png" class=" ml-3" alt="" >
			</div>
		</div>
	</div>

	<div class="page-section" style="background: #fff;margin-bottom:100px;">
		<div class="container">
			<div class="text-center wow fadeInUp">
            <h2 class="title-section">Hubungi Kami</h2>
            <div class="social-media-links">
                <a href="https://wa.me/yourwhatsappnumber" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://www.instagram.com/yourinstagramhandle" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/yourfacebookpage" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </div>
        </div>
        

			


</section>
<script src="{{asset('profile')}}/js/jquery-3.5.1.min.js"></script>
<script src="{{asset('profile')}}/js/google-maps.js"></script>
<script src="{{asset('profile')}}/vendor/wow/wow.min.js"></script>
<script src="{{asset('profile')}}/js/theme.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
@endsection