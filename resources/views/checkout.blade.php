<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <title>Tiket WIsata</title>
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
                {{-- 
               
                  $nama = DB::table('wisata')->get()?>--}}
                {{-- <tr>
                    <td>Nama Wisata</td>
                    <td> : {{$dataWisata->nama_wisata}}</td>
                </tr>  --}}
                {{-- <div class="form-group">
                  <label for="total">Id wisata:</label>
                  <input class="form-control" type="number" id="id_wisata" name="id_wisata" rows="3" required readonly value="{{$data_wisata->id}}"></input>
              </div> --}}
              <tr style="display:none">
                <td>id_user</td>
                <td> {{Auth::id()}}</td>
              </tr>
              <tr>
                <td>Nama Wisata</td>
                <td> : {{$wisata->nama_wisata}}</td>
              </tr>
                {{-- <tr>
                  <td>Nama Wisata</td>
                  <td> : {{$wisata->nama_wisata}}</td>
                </tr> --}}
                <tr>
                  <td>jenis_tiket</td>
                  <td> : {{$nama_tiket}}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td> : {{$orders->name}}</td>
                </tr>
                <tr>
                    <td>No Hp</td>
                    <td> : {{$orders->phone}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> : {{$orders->address}}</td>
                </tr>
                <tr>
                    <td>Qty</td>
                    <td> : {{$orders->qty}}</td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td> : {{$orders->total_price}}</td>
                </tr>
              </table>
              <button class="btn btn-primary mt-3" id="pay-button">Bayar Sekarang</button>    
            </div>
        </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
          // Also, use the embedId that you defined in the div above, here.
          window.snap.pay('{{$snapToken}}', {
            // embedId: 'snap-container',
            onSuccess: function (result) {
              /* You may add your own implementation here */
              window.location.href = '/invoice/{{$orders->id}}'
              console.log(result);
            },
            onPending: function (result) {
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
            },
            onError: function (result) {
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function () {
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          });
        });
      </script>
</body>
</html>