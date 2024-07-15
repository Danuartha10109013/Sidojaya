<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tiket WIsata</title>
    <link href="{{ asset('css/invoice.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-header text-center">
                Invoice
            </div>
            <div class="card-body">
                <h5 class="card-title">Detail Pesanan</h5>
                <table class="table-custom">
                    <tr>
                        <th>Nama</th>
                        <td>{{$orders->name}}</td>
                    </tr>
                    <tr>
                        <th>No Hp</th>
                        <td>{{$orders->phone}}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{$orders->address}}</td>
                    </tr>
                    <tr>
                        <th>Qty</th>
                        <td>{{$orders->qty}}</td>
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <td>Rp.{{$orders->total_price}}</td>
                    </tr>
                    <tr>
                        <td>Nama Wisata</td>
                        <td> : {{$wisata->nama_wisata}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>