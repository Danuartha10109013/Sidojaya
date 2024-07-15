<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tiket WIsata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="my-3">Tiket Wisata</h1>
        <div class="card" style="width: 18rem;">
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
            <div class="card-body">
              {{-- <h5 class="card-title">Tiket Wisata</h5>
              <p class="card-text">Tiket tempat wisata daerah kota subang.</p> --}}
              <form action="/checkout"  method="POST">
                @csrf
                <h2 class="card-title">
                    {{ $data_wisata->nama_wisata }}
                </h2>
                <p class="card-text">Tiket tempat wisata daerah kota subang.</p>
                <div class="mb-3">
                   
                    <label for="id_tiket" class="form-label">Jenis Tiket</label>
                        <select name="id_tiket" class="form-control" id="id_tiket">
                            <option value="">Pilih Jenis Tiket</option>
                            {{-- <option value="anak-anak">Anak-Anak</option>
                            <option value="dewasa">Dewasa</option> --}}
                            @foreach($data_tiket as $items)
                            <option value={{$items->id}}>{{$items->nama_tiket}}</option>
                            @endforeach
                        </select>

                    
                </div>
                <div class="form-group">
                    <input class="form-control" type="number" id="id_wisata" name="id_wisata" rows="3" required readonly hidden value="{{$data_wisata->id}}"></input>
                </div>
                <div class="mb-3">
                    <label for="qty" class="form-label">Mau Pesan Berapa?</label>
                    {{-- <input type="text" name="wisata" class="" hidden value="{{$data_wisata->nama_wisata}}"> --}}
                    <input type="number" name="qty" class="form-control" id="qty" 
                        placeholder="jumlah yang dipesan">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Pelanggan</label>
                    <input type="text" name="name" class="form-control" id="name" 
                        placeholder="masukan nama anda!">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">No Telp</label>
                    <input type="text" name="phone" class="form-control" id="phone" 
                        placeholder="masukan no hp!">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea name="address" class="form-control" id="address" rows="3"></textarea>
                </div>

                <button class="btn btn-primary">Checkout</button>
              </form> 
            </div>
        </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>