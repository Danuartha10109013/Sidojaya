@section ('')
<nav id="navbar" class="navbar">
    <ul>

        {{-- <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
        </nav> --}}
        <li><a href="{{ route('pengunjung') }}" class="active">Beranda</a></li>
        <li class="dropdown"><a href="#"><span>Destinasi Wisata</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                @foreach ($data_kategori as $data)
                    <li><a href="{{ route('kategoripengunjung-search', $data->id) }}">{{ $data->nama_kategori }}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="{{ route('eventpengunjung') }}">Event Wisata</a></li>
        {{-- <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Registrasi</a></li> --}}
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Profil <i class="bi bi-person"></i> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Saya, ({{ auth()->user()->name }})</a></li> <!-- Menampilkan nama pengguna -->
                <li role="separator" class="divider"></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->
