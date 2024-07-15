<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{config('midtrans.client_key')}}"></script>
    <title>Tiket Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="my-3">Tiket Wisata</h1>
        <div class="card" style="width: 18rem;">
            <img src="{{ url('backend/assets/img/brand/ticket.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Detail Pesanan</h5>
              <table>
                <tr>
                  <td>jenis_penginapan</td>
                  <td> : {{$nama_penginapan}}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td> : {{$reservasi->nama}}</td>
                </tr>
                <tr>
                  <td>Jumlah Hari</td>
                  <td> : {{$reservasi->jumlah_hari}}</td>
                </tr>
                <tr>
                  <td>Tanggal</td>
                  <td> : {{$reservasi->tanggal}}</td>
                </tr>
                <tr>
                    <td>No Telp</td>
                    <td> : {{$reservasi->phone}}</td>
                </tr>
                <tr>
                  <td>Total Bayar</td>
                  <td> : {{$reservasi->total_bayar}}</td>
                </tr>
              </table>
              <button class="btn btn-primary mt-3" id="pay-button">Bayar Sekarang</button>    
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          window.snap.pay('{{$snapToken}}', {
            onSuccess: function (result) {
              window.location.href = '/invoicepeng/{{$reservasi->id}}';
              console.log(result);
            },
            onPending: function (result) {
              alert("waiting your payment!"); console.log(result);
            },
            onError: function (result) {
              alert("payment failed!"); console.log(result);
            },
            onClose: function () {
              alert('you closed the popup without finishing the payment');
            }
          });
        });
    </script>
</body>
</html>
