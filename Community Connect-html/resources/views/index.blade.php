<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="{{ asset('images/logo_communityconnect.png') }}" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!DOCTYPE html>
  <html>
  <head>
    <!-- Your head content -->
  </head>
  <body>
  
    <!-- Your existing HTML content -->
  
    <!-- profile tab bar -->

  
  </body>
  </html>
  <style>
    .hero_area {
      background-color: #f5f5f5;
      padding: 20px 0;
      text-align: center;
    }
    .hero_area h1 {
      font-size: 36px;
      font-weight: 600;
      color: #333;
      margin-bottom: 20px;
    }
    .hero_area p {
      font-size: 18px;
      color: #666;
      margin-bottom: 30px;
    }
    .hero_area .btn-box {
      margin-top: 10px;
    }
    .hero_area .btn1,
    .hero_area .btn2 {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      margin-right: 10px;
    }
    .hero_area .btn1:hover,
    .hero_area .btn2:hover {
      background-color: #0056b3;
    }
  </style>
  
  <title>Community Connect</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />

  <!-- font awesome style -->
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

</head>

<body>
  <style>
    .navbar-nav {
      margin-top: 10px; /* Mengatur jarak antara navbar dan header */
    }
    .navbar-nav .nav-item {
      margin-right: 5px; /* Mengurangi jarak antara setiap item navbar */
    }
    .navbar-nav .nav-link {
      padding-top: 0px; /* Mengurangi padding atas dari link */
      padding-bottom: 0px; /* Mengurangi padding bawah dari link */
    }
  </style>
  
  <div class="hero_area">
  <!-- header section starts -->
<header class="header_section long_section px-0">
  <nav class="navbar navbar-expand-lg custom_nav-container">
    <a class="navbar-brand" href="/">
      <span>
      C-connect
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class=""> </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about"> About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/features">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/blog">Projects</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" href="/profile">
              <i class="fa fa-user" aria-hidden="true"></i> Profile
            </a>
          </li>
          @endauth
          @guest
          <li class="nav-item">
            <a class="nav-link" href="/login">login</a>
          </li> 
          @endguest
           
          
          
        </ul>
        <div class="quote_btn-container">
          <form class="form-inline">
            <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </nav>
</header>
<!-- end header section -->

    <!-- slider section -->
    <section class="slider_section long_section">
      <div id="customCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-5">
                  <div class="detail-box">
                    <h1>
                      Community Connect <br>
                      for connecting communities
                    </h1>
                    <p>
                      Community Connect siap menjadi wadah tempat berbagai komunitas sosial menyebarkan juga memberikan partisipasi dalam berbagai kegiatan sosial.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Contact Us
                      </a>
                      <a href="" class="btn2">
                        About Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="img-box">
                    <img src="{{ asset('images/connect1.png') }}" alt="slider" class="img-fluid">

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-5">
                  <div class="detail-box">
                    <h1>
                      Community Connect <br>
                      for better social welfare
                    </h1>
                    <p>
                      Dengan Community Connect, segala kegiatan sosial dapat terfasilitasi dengan baik.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Contact Us
                      </a>
                      <a href="" class="btn2">
                        About Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="img-box">
                    <img src="{{ asset('images/connect2.png') }}" alt="slider" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>                
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel" data-slide-to="1"></li>
          <li data-target="#customCarousel" data-slide-to="2"></li>
        </ol>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- furniture section -->
  

  <section class="furniture_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Our Features
        </h2>
        <p>
          
        </p>
      </div>
      <div class=" d-flex flex-row justify-content-center">
        <div class=" col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('images/blood1.png') }}" alt="slider" class="img-fluid">
            </div>
            <div class="detail-box">
              <h5>
                Kegiatan Volunteer
              </h5>
              <div class="price_box">
                <h6 class="price_heading">
                  Kegiatan volunteer dibagi menjadi beberapa kategori, seperti kesehatan, lingkungan, pengabdian masyarakat, kampanye, dan sebagainya.
                </h6>
                <a href="">
                  Selengkapnya
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class=" col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('images/rewards.png') }}" alt="slider" class="img-fluid">
            </div>
            <div class="detail-box">
              <h2>
                Poin dan Rewards
              </h2>
              <div class="price_box">
                <h6>
                  Pengguna yang telah menyelesaikan kontribusinya pada suatu kegiatan sosial dapat mengoleksi poin dan menukarkannya dengan rewards.
                </h6>
                <a href="">
                  Selengkapnya
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </section>

  <!-- end furniture section -->


  <!-- about section -->

  <section class="about_section layout_padding long_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{ asset('images/about.png') }}" alt="slider" class="img-fluid">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
              Community Connect adalah platform yang menyediakan fitur kepada pengguna untuk membagikan informasi kegiatan sosial juga menjadi partisipan dalam kegiatan sosial lainnya.
            </p>
            <a href="">
              Selengkapnya
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- blog section -->

  <section class="blog_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Kegiatan Mendatang
        </h2>
      </div>
      <div class="row">
        @if ($kegiatan->count() == 0)
        <h2>
          Belum ada Kegiatan
        </h2>
        @else
          @foreach ($kegiatan as $item)
          <div class="col-md-6 col-lg-4 mx-auto">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('storage/' .$item->gambar_kegiatan) }}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  {{ $item->nama_kegiatan }}
                </h5>
                <p>
                  {{ $item->nama_kegiatan }} ini akan dilakukan di {{ $item->lokasi_kegiatan }}, pada {{ $item->waktu_pelaksanaan }}
                </p>
                <form action="{{ route('user.join', $item->id_kegiatan) }}" method="post">
                  @method('POST')
                  @csrf
                  <button type="submit" >
                      Daftar
                  </button>
                </form>
                
                
              </div>
            </div> 
          </div>  
        
          @endforeach
          @endif
        </div> 
    </div>
  </section>

  <!-- end blog section -->

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Documentations
        </h2>
      </div>
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="{{ asset('images/client.jpg') }}" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                        Penggalangan Donasi
                      </h6>
                    </div>
                    <p>
                      Penggalangan Donasi yang ditujukan untuk para korban bencana banjir di Cianjur telah disampaikan kepada para warga setempat.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="{{ asset('images/client.jp') }}g" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                        Pengabdian Masyarakat
                      </h6>
                    </div>
                    <p>
                      Pengabdian Masyarakat yang diadakan di Desa A, Sidoarjo membuahkan para siswa yang menjadi semakin paham tentang penggunaan tools desain.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="{{ asset('images/client.jpg') }}" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                        From Waste to Use
                      </h6>
                    </div>
                    <p>
                      Kegiatan From Waste to Use telah berhasil meningkatkan keterampilan serta motivasi warga Kampung B, Banyuwangi untuk senantiasa mengurangi limbah plastik dengan memanfaatkannya kembali.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-container">
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

 <!-- login section -->

<!-- end contact section -->

 

  <!-- info section -->
  <section class="info_section long_section">

    <div class="container">
      <div class="contact_nav">
        <a href="">
          <i class="fa fa-phone" aria-hidden="true"></i>
          <span>
            Call : +01 123455678990
          </span>
        </a>
        <a href="">
          <i class="fa fa-envelope" aria-hidden="true"></i>
          <span>
            Email : community_connect@gmail.com
          </span>
        </a>
        <a href="">
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          <span>
            Surabaya, Indonesia
          </span>
        </a>
      </div>

      
          </div>
          <div class="col-md-4">
            <div class="info_form">
              <h4>
                SIGN UP TO OUR NEWSLETTER
              </h4>
              <form action="">
                <input type="text" placeholder="Enter Your Email" />
                <button type="submit">
                  Subscribe
                </button>
              </form>
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end info_section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> 
        <a href="https://html.design/"></a>
      </p>
    </div>
  </footer>
  <!-- footer section -->


  <!-- jQery -->
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <!-- bootstrap js -->
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <!-- custom js -->
  <script src="{{ asset('js/custom.js') }}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>

</html>