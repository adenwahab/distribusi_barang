@extends('landingpage.index')
@section('content')
<section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team 2</h2>
          <p>Tim kami adalah kelompok yang berdedikasi untuk mengembangkan aplikasi manajemen toko percetakan yang efisien dan inovatif. Kami memiliki keahlian dalam pengembangan perangkat lunak, desain antarmuka pengguna, dan pemahaman mengenai industri percetakan.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-sm-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="{{ asset('assets/img/team/afkar.jpg') }}" class="img-fluid" alt="">
                <div class="social">
                  <a href="instagram.com/afkar.siddiq"><i class="bi bi-instagram"></i></a>
                  <a href="https://www.linkedin.com/in/afkar-siddiq-092556222?trk=contact-info"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>M. Afkar Siddiq</h4>
                <span>Ketua Tim</span>
                <span>Universitas Syiah Kuala</span>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-sm-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="member-img">
                <img src="{{ asset('assets/img/team/wahab.jpg') }}" class="img-fluid" alt="">
                <div class="social">
                  <a href="https://github.com/adenwahab"><i class="bi bi-github"></i></a>
                  <a href="https://instagram.com/adennwahab?igshid=NGExMmI2YTkyZg=="><i class="bi bi-instagram"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Abdul Wahab Saepul H</h4>
                <span>Backend</span>
                <span>STMIK Bandung</span>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-sm-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <div class="member-img">
                <img src="{{ asset('assets/img/team/irfan.jpg') }}" class="img-fluid" alt="">
                <div class="social">
                  <a href="https://twitter.com/JalannSantai?t=5jxZIuSRrq862FcGxB3iyg&s=09"><i class="bi bi-twitter"></i></a>
                  <a href="https://instagram.com/irfannr18?igshid=MTIzZWQxMDU="><i class="bi bi-instagram"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Irfan Nurrahman</h4>
                <span>Frontend</span>
                <span>Universitas Amikom Purwokerto</span>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
              <div class="member">
                <div class="member-img">
                  <img src="{{ asset('assets/img/team/alam.jpg') }}" class="img-fluid" alt="">
                  <div class="social">
                    <a href="https://www.instagram.com/alamcahyo_/"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/alamcahyo/"><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Alam Cahyo Laksono</h4>
                  <span>UI/UX</span>
                  <span>Universitas Pembangunan Nasional "Veteran" Jakarta</span>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="member">
                <div class="member-img">
                  <img src="{{ asset('assets/img/team/nina.jpg') }}" class="img-fluid" alt="">
                  <div class="social">
                    <a href="https://twitter.com/Ninaapriy13"><i class="bi bi-twitter"></i></a>
                    <a href="https://instagram.com/ninaapriy13?igshid=MzNlNGNkZWQ4Mg=="><i class="bi bi-instagram"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Nina Apriyanti</h4>
                  <span>Database</span>
                  <span>Universitas Swadaya Gunung Jati</span>
                </div>
              </div>
            </div>

</div>

      </div>
</section>
@endsection