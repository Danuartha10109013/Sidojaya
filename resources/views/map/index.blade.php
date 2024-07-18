@extends('template.frontend.main')

@section('content')
<script src="https://kit.fontawesome.com/85ec87b76d.js" crossorigin="anonymous"></script>
<style>
    .judul {
        text-align: center;
        margin-bottom: 20px;
    }
    .judul h1 {
        color: white;
        z-index: 100;
    }
    .map-container {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
    }
    .map-container img {
        width: 100%;
        max-width: 300px;
    }
    .container .source {
        text-align: center;
        font-size: 9px;
    }
    .point, .point1, .point2 {
        position: absolute;
        z-index: 101;
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
    }
    .point i, .point1 i, .point2 i {
        font-size: 2em;
        color: red;
    }
    .informasi, .informasi1, .informasi2 {
        display: none;
        position: absolute;
        background: white;
        border: 1px solid #ddd;
        padding: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        z-index: 102;
        width: 200px;
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }
    .informasi.show, .informasi1.show, .informasi2.show {
        display: block;
        opacity: 1;
    }
    .informasi h4, .informasi1 h4, .informasi2 h4 {
        margin-top: 0;
    }
    .informasi {
        top: 40px; /* Adjust relative position for .point */
        left: -50px;
    }
    .informasi1 {
        top: 40px; /* Adjust relative position for .point1 */
        left: -50px;
    }
    .informasi2 {
        top: 40px; /* Adjust relative position for .point2 */
        left: -50px;
    }
</style>

<div class="container">
    <div class="judul">
        <h1>Peta Desa Sidajaya</h1>
    </div>
    <div class="map-container">
        <img src="{{ asset('assets/img/maps sidajaya.png') }}" alt="Peta Desa Sidajaya" class="img-fluid">
        
        <!-- Point 1 -->
        <div class="point" style="top: 30%; left: 40%;">
            <a href="wisata-detail/33">
                <i class="fas fa-location-dot"></i>
                <p>Jembatan Lori</p>
                <div class="informasi">
                    <h4 style="color: black">Jembatan Lori</h4>
                    <img src="{{ asset('img/galeri/jembatan lori.jpg') }}" alt="Jembatan Lori">
                    <p style="font-size: 12px; color:black;">Jembatan Lori atau sekarang dikenal dengan sebutan Jembatan Pelangi...</p>
                </div>
            </a>
        </div>

        <!-- Point 2 -->
        <div class="point1" style="top: 50%; left: 60%;">
            <a href="wisata-detail/33">
                <i class="fas fa-location-dot"></i>
                <p>Batik Ecoprint</p>
                <div class="informasi1">
                    <h4 style="color: black">Batik Ecoprint</h4>
                    <img src="{{ asset('img/galeri/batik ecoprint.jpg') }}" alt="Batik Ecoprint">
                    <p style="font-size: 12px; color:black;">Batik ecoprint merupakan produk lokal yang dikembangkan oleh masyarakat...</p>
                </div>
            </a>
        </div>

        <!-- Point 3 -->
        <div class="point2" style="top: 70%; left: 50%;">
            <i class="fas fa-location-dot"></i>
            <p>Pantai Sidajaya</p>
            <div class="informasi2">
                <h4 style="color: black">Pantai Sidajaya</h4>
                <img src="{{ asset('img/galeri/pantai sidajaya.jpg') }}" alt="Pantai Sidajaya">
                <p style="font-size: 12px; color:black;">Pantai Sidajaya terkenal dengan pemandangan yang indah...</p>
            </div>
        </div>
    </div>
    <div class="source">
        <p>source from: <a href="https://www.mangyono.com/2017/08/desa-sidajaya-kecamatan-cipunagara.html" target="_blank">Mangyono</a></p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var points = document.querySelectorAll('.point, .point1, .point2');
        
        points.forEach(function(point) {
            var info = point.querySelector('.informasi, .informasi1, .informasi2');

            point.addEventListener('mouseover', function() {
                info.classList.add('show');
            });

            point.addEventListener('mouseout', function() {
                info.classList.remove('show');
            });
        });
    });
</script>
@endsection
