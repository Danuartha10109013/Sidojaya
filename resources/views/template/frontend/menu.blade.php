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
        <li><a href="{{ route('home') }}" class="active">Beranda</a></li>
        <li class="dropdown"><a href="#"><span>Destinasi Wisata</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                @foreach ($data_kategori as $data)
                    <li><a href="{{ route('kategori-search', $data->id) }}">{{ $data->nama_kategori }}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="{{ route('event') }}">Event Wisata</a></li>
        <li><a href="{{ route('maps') }}">Maps</a></li>
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Registrasi</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->
