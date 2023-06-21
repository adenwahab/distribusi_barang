<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo">
            <a href="/"><img src="{{ asset('assets/img/logo-test.png') }}" width="50" height="60"></a>
        </h1>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="{{ url('/') }}">Home</a></li>
                <li><a class="nav-link scrollto " href="{{ url('/about') }}">About</a></li>
                <li><a class="nav-link scrollto " href="{{ url('/ourbarang') }}">Product</a></li>
                <li><a class="nav-link scrollto " href="{{ url('/team') }}">Team</a></li>

                <li class="dropdown"><a href="#"><span>Kategori</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ url('/coworking') }}">Coworking Space</a></li>
                        <li><a href="{{ url('/foto') }}">Foto</a></li>
                        <li><a href="{{ url('/largform') }}">Large Format</a></li>
                        <li><a href="{{ url('/marketing') }}">Marketing Tools</a></li>
                        <li><a href="{{ url('/packaging') }}">Packaging</a></li>
                        <li><a href="{{ url('/printkain') }}">Print Kain</a></li>
                        <li><a href="{{ url('/printlembar') }}">Print Lembaran</a></li>
                        <li><a href="{{ url('/printterior') }}">Printterior</a></li>
                        <li><a href="{{ url('/promo') }}">Promo and Gift</a></li>
                        <li><a href="{{ url('/signage') }}">Signage</a></li>
                        <li><a href="{{ url('/stationary') }}">Stationary</a></li>
                        <li><a href="{{ url('/umkm') }}">UMKM</a></li>


                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="{{ url('/contact') }}">Contact</a></li>
                <li><a class="getstarted scrollto" href="{{ url('/login') }}">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
