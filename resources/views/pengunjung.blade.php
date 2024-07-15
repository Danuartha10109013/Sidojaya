@extends('template.frontend.mainpengunjung')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
           
                <div class="carousel-inner" role="listbox">
				 //@foreach ($data_wisata as $data)
                    <!-- Slide 1 -->
                    <div class="carousel-item active" style="background-image: url(assets/img/blog/sample.jpg)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">Kolam Renang Three Stars</h2>
                                <p class="animate__animated animate__fadeInUp">Kolam renang three stars ini memiliki 3 kolam renang yang bisa dinikmati pengunjung serta dilengkapi dengan fasilitas seperti tenis meja, mushola, kamar mandi.
                                </p>
                                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
					       //@endforeach
                    <!-- Slide 2 -->
                    <!-- Slide 3 -->
                </div>
     
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
    </section><!-- End Hero -->
    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="row content">
                    <div class="col-lg-6">
                        <h2>Platform Wisata Subang</h2>
                        <h3>Subang Gateway
                        </h3>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            Contact person
                        </p>
                        <ul>
                            @foreach($data_aboutus as $items)
                            <li><i class="ri-check-double-line"></i> {{$items->nama_aboutus}}
                            </li>
                            <li><i class="ri-check-double-line"></i> {{$items->no_telpon}}
                            </li>
                            <li><i class="ri-check-double-line"></i> {{$items->nama_perusahaan}}
                            </li>
                        </ul>
                        <p class="fst-italic">
                            {{$items->keterangan}}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End About Section -->
    </main><!-- End #main -->
@endsection
