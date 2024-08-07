@extends('template.frontend.mainpengunjung')
@section('content')
    <main id="main">
        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <di class="col-lg-12 mt-5 entries">
                        <article class="entry entry-single">
                            <div class="entry-img">
                                @php
                                    $cek_foto = DB::table('galeri')
                                        ->where('id_wisata', '=', $data_wisata->id)
                                        ->get();
                
                                    $gambar = DB::table('galeri')
                                        ->where('id_wisata', '=', $data_wisata->id)
                                        ->first();
                                @endphp
                                @if ($cek_foto->isEmpty())
                                    <img src="{{ url('assets/img/no_image.jpg') }}" alt="" class="img-fluid">
                                @else
                                    <img src="{{ asset('img/galeri/' . $gambar->nama_gambar) }}" title=""
                                        alt="" class="img-fluid">
                                @endif
                            </div>
                            <h2 class="entry-title">
                                {{ $data_wisata->nama_wisata }}
                            </h2>
                            <hr>
                            <div class="entry-content">
                                <p>
                                    {{ $data_wisata->deskripsi }}
                                </p>
                                <hr>
                                <h3>Fasilitas Umum :</h3>
                                {{ $data_wisata->fasilitas }}

                                <hr>
                                <h3 class="mb-4">Harga Tiket :</h3>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="card border-primary text-center">
                                            <div class="card-body">
                                                <h4>HTM</h4>
                                                <h6>IDR {{ number_format($data_wisata->harga_tiket) }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="card border-primary text-center">
                                            <div class="card-body">
                                                <h4>KONTAK</h4>
                                                <h6>{{ $data_wisata->kontak_pengelola }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="card border-primary text-center">
                                            <div class="card-body">
                                                <h4>MAPS</h4>
                                                <a href="https://maps.google.com/?q={{ $data_wisata->gmaps }}"
                                                    target=_blank>Klik disini</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="card border-primary text-center">
                                            <div class="card-body">
                                                <h4>Pesan Tiket</h4>
                                                <a href="{{ route('payment', $data_wisata->id) }}">Klik disini</a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-2">
                                        <div class="card border-primary text-center">
                                            <div class="card-body">
                                                <h4>Reservasi Penginapan</h4>
                                                <a href="{{ route('penginapan', $data_wisata->id) }}">Klik disini</a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>

                                <!-- Ulasan Section -->
                                <section id="ulasan" class="ulasan">
                                    <div class="container" data-aos="fade-up">
                                        <div class="row">
                                            <div class="col-lg-12 mt-5">
                                                <h2>Ulasan Pengunjung</h2>
                                                @foreach($data_ulasan as $review)
                                                <div class="card mt-3">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $review->nama }}</h5>
                                                        <p class="card-text">
                                                            @for ($i = 0; $i < $review->rating; $i++)
                                                                <span style="color: gold;">&#9733;</span>
                                                            @endfor
                                                        </p>
                                                        <p class="card-text">{{ $review->deskripsi }}</p>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </section><!-- End Ulasan Section -->
                                

                                <!-- Form ulasan -->
                                @auth
                                <div class="row mt-5">
                                    <div class="col-lg-12">
                                        <h3>Tulis Ulasan Anda</h3>
                                        <form action="/ulasan/{{$data_wisata->id}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="nama" value="{{ auth()->user()->name }}">
                                            <div style="display: flex; align-items: center;">
                                                <strong style="margin-right: 10px;">Rating :</strong>
                                                <div class="rating">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}"
                                                            {{ old('rating') == $i ? 'checked' : '' }} />
                                                        <label for="star{{ $i }}" title="{{ $i }} stars">&#9733;</label>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Ulasan:</label>
                                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                
                                                <input class="form-control" type="number" id="deskripsi" name="id_wisata" rows="3" required readonly hidden value="{{$data_wisata->id}}"></input>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                                        </form>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const stars = document.querySelectorAll('.rating input[type="radio"]');
                                                stars.forEach(star => {
                                                    star.addEventListener('click', function() {
                                                        let currentRating = this.value;
                                                        stars.forEach(star => {
                                                            star.checked = star.value <= currentRating;
                                                            if (star.checked) {
                                                                star.nextElementSibling.style.color = 'yellow';
                                                            } else {
                                                                star.nextElementSibling.style.color = 'gray';
                                                            }
                                                        });
                                                    });
                                                });
                                            });
                                        </script>
                                </div>
                            </div>
                            @endauth
                        </article><!-- End blog entry -->
                    </div><!-- End blog entries list -->
                </div><!-- End row -->
            </div><!-- End container -->
        </section><!-- End Blog Single Section -->
    </main><!-- End #main -->
@endsection
