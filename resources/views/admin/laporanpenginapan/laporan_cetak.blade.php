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
            border: 1px solid #543535;
        }
    </style>
    <title>CETAK DATA Penginapan</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Penginapan</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pemesan</th> 
                    <th scope="col">Jumlah Hari</th>  
                    <th scope="col">Tanggal</th>             
                    <th scope="col">Phone</th>
                    <th scope="col">Total Bayar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_reservasi as $data)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->jumlah_hari }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->total_bayar }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
