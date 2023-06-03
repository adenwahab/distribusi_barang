<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="index.html">OnePage</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="{{ url('/barang') }}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{ url('/about') }}">About</a></li>
                <li><a class="nav-link scrollto" href="{{ url('/services') }}">Services</a></li>
                <li><a class="nav-link scrollto o" href="{{ url('/portfolio') }}">Portfolio</a></li>
                <li><a class="nav-link scrollto" href="{{ url('/team') }}">Team</a></li>
                <li><a class="nav-link scrollto" href="#">Pricing</a></li>
                <li class="dropdown"><a href="#"><span>Kategori</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="{{ url('/contact') }}">Contact</a></li>
                <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
