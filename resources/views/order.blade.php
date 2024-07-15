<!-- resources/views/order.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Pemesanan Tiket</title>
    <link rel="stylesheet" href="{{ asset('css') }}/custom.css">
</head>
<body>
    <div class="container">
        <h2 class>Pemesanan Tiket</h2>
        <form method="POST" action="/order">
            @csrf
            <div class="form-group">
                <label for="name">Nama Pemesan:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">Alamat:</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label for="date">Tanggal Pemesanan:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="quantity">Jumlah Tiket:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="form-group">
                <label for="total">Total Bayar:</label>
                <input type="text" class="form-control" id="total" name="total" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Pesan</button>
        </form>
    </div>
</body>
</html>
