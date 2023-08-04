@extends('landingpage.index')
@section('content')

<section id="services" class="services section-bg">



  <!-- Start Banner Hero -->
  <!-- Start Banner Hero -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false" data-aos="fade-up" data-aos-delay="100">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('assets/img/carousel/carousel-2.jpg') }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2>Cetak Yuk!</h2>
          <p>kami siap mencetak produk yang anda inginkan.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('assets/img/carousel/carousel-2.jpg') }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2>Produk berkualitas</h2>
          <p>Kami menyediakan produk berkualitas.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('assets/img/carousel/carousel-3.jpg') }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <div class="shadow">
            <h2>Siap melayani 24/7</h2>
            <p>pelayanan yang kami berikan siap melayani 24/7.</p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- End Banner Hero -->
  <!-- End Banner Hero -->
</section>
@include('landingpage.services')
@endsection