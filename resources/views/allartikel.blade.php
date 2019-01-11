<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Raptor - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/open-iconic-bootstrap.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css ') }}">
    
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.theme.default.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css ') }}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css ') }}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/ionicons.min.css ') }}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-datepicker.css ') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery.timepicker.css ') }}">

    
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css ') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/icomoon.css ') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css ') }}">
  </head>
  <body>
    
    
    <!-- <div class="js-fullheight"> -->
    <div class="hero-wrap">
      <div class="overlay"></div>
      <div class="circle-bg"></div>
      <div class="circle-bg-2"></div>
      <div class="container-fluid">
        <div class="row no-gutters d-flex slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <pre class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/"><b>Home</b></a></span> <span><b>Artikel</b></span></pre>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">All Artikel</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
          @foreach($artikel as $data)
            @if($data->ket == 'Publish')
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="{{ route('frontend.show',$data->id) }}" class="block-20" style="background-image: url('Image/Artikel/{{$data->foto}}');">
              </a>
              <div class="text p-4 d-block">
                <div class="meta mb-3">
                  <pre><span class="icon-calendar">&nbsp</span>{{$data->created_at->diffForHumans()}}&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp<span class="icon-eye"></span> {{$data->id}}</pre>
                </div>
                <h3 class="heading"><a href="#">{{$data->title}}</a></h3>
              </div>
            </div>
          </div>
          @elseif ($data->ket == 'Unpublish')

          @endif

          @endforeach
        </div>
              </div>
    </section>


    <footer class="ftco-footer ftco-bg-dark ftco-section" id="about">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">SMP Istiqomah.</h2>
              <p class="mt-4"><a href="#" class="btn btn-primary p-3">Login</a></p>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#home" class="py-2 d-block">Home</a></li>
                <li><a href="#feature" class="py-2 d-block">Fitur</a></li>
                <li><a href="#review" class="py-2 d-block">Testimoni</a></li>
                <li><a href="#blog" class="py-2 d-block">Artikel</a></li>
                <li><a href="/login" class="py-2 d-block">Login</a></li>
                <li><a href="#about" class="py-2 d-block">Tentang</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
                <div class="block-23 mb-3">
                  <ul>
                    <li><span class="icon icon-map-marker"></span><span class="text">Kp. Babakan Gelar, Cibaregbeg, Cibeber, 43262, Pamoyanan, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43211</span></li>
                    <li><a href="#"><span class="icon icon-phone"></span><span class="text">(0263)2336556</span></a></li>
                    <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                    <li><span class="icon icon-clock-o"></span><span class="text">Senin &mdash; Sabtu 7:00 - 16:00</span></li>
                  </ul>
                </div>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('frontend/assets/js/jquery.min.js ') }}"></script>
  <script src="{{ asset('frontend/assets/js/jquery-migrate-3.0.1.min.js ') }}"></script>
  <script src="{{ asset('frontend/assets/js/popper.min.js ') }}"></script>
  <script src="{{ asset('frontend/assets/js/bootstrap.min.js ') }}"></script>
  <script src="{{ asset('frontend/assets/js/jquery.easing.1.3.js ') }}"></script>
  <script src="{{ asset('frontend/assets/js/jquery.waypoints.min.js ') }}"></script>
  <script src="{{ asset('frontend/assets/js/jquery.stellar.min.js ') }}"></script>
  <script src="{{ asset('frontend/assets/js/owl.carousel.min.js ') }}"></script>
  <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js ') }}"></script>
  <script src="{{ asset('frontend/assets/js/aos.js ') }}"></script>
  <script src="{{ asset('frontend/assets/js/jquery.animateNumber.min.js ') }}"></script>
  <script src="{{ asset('frontend/assets/js/bootstrap-datepicker.js ') }}"></script>
  <script src="{{ asset('frontend/assets/js/jquery.timepicker.min.js ') }}"></script>
  <script src="{{ asset('frontend/assets/js/scrollax.min.js ') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('frontend/assets/js/google-map.js ') }}"></script>
  <script src="{{ asset('frontend/assets/js/main.js ') }}"></script>
  <script>
    window.intergramId = "699338199";
    window.intergramCustomizations = {
        titleClosed: 'Chat Tertutup',
        titleOpen: 'Chat Terbuka',
        introMessage: 'Selamat Datang!! Silahkan Bertanya Jika Ada Pertanyaan',
        mainColor: "#2196F3", // Can be any css supported color 'red', 'rgb(255,87,34)', etc
        alwaysUseFloatingButton: false // Use the mobile floating button also on large screens
    };
</script>
<script id="intergram" type="text/javascript" src="https://www.intergram.xyz/js/widget.js"></script>
    
  </body>
</html>