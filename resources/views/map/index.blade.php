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
    .point {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 101;
        flex-direction: column;
    }
    .point i {
        font-size: 2em;
        color: red;
        cursor: pointer;
    }
    .informasi {
        display: none;
        position: absolute;
        top: 60%;
        left: 50%;
        transform: translate(-50%, -30%);
        background: white;
        border: 1px solid #ddd;
        padding: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        z-index: 102;
    }
    .informasi h3 {
        margin-top: 0;
    }
</style>

<div class="container">
    <div class="judul">
        <h1>Peta Desa Sidajaya</h1>
    </div>
    <div class="map-container">
        <img src="{{asset('assets/img/maps sidajaya.png')}}" alt="Peta Desa Sidajaya" class="img-fluid">
        <div class="point">
            <a href="a" target="_blank">
            <i class="fas fa-location-dot"></i>
            <p>Jembatan Lori</p>
        </a>
        </div>
        <div class="informasi">
 
                <h3>Jembatan Lori</h3>
                <img src="{{asset('img/galeri/jembatan lori.jpg')}}" alt="ini image nya">
                <p>ini keterangnnyaa</p>

        </div>
    </div>
    <div class="source">
        <p>source from : https://www.mangyono.com/2017/08/desa-sidajaya-kecamatan-cipunagara.html</p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var icon = document.querySelector('.point');
        var info = document.querySelector('.informasi');

        icon.addEventListener('mouseover', function() {
            info.style.display = 'block';
        });

        icon.addEventListener('mouseout', function() {
            info.style.display = 'none';
        });
    });
</script>
@endsection
