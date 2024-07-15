<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            /* left: 3%; */
            border: 1px solid #543535;
        }
    </style>
    <title>CETAK DATA TIKET</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Kunjungan Individu</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pembeli</th> 
                <th scope="col">Phone</th>  
                <th scope="col">Alamat</th>             
                <th scope="col">Qty</th>
                <th scope="col">Total Harga</th>
                {{-- <th scope="col">Aksi</th> --}}
            </tr>
            @foreach ($data_order as $data)
                  
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->qty}}</td>
                    <td>{{$data->total_price}}</td>
                  </tr> 
            @endforeach
        </table>
        <script type="text/javascript">
            window.print();
        </script>
</body>

</html>