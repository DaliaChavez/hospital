<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SystemDoc</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>


    <!-- Custom styles for this template -->
    <link href="assets/css/agency.min.css" rel="stylesheet">
    <!-- Main Stylesheet File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link rel="shortcut icon" href="{{{ asset('img/LogoSystemDoc.png') }}}">

   <!-- Libraries CSS Files -->
   <link href="lib/animate/animate.min.css" rel="stylesheet">
   <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
   <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">SystemDoc</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menú
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Acerca</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Áreas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#history">Historia</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">Equipo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#testimonials">Galería</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#mapa">Ubicación</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contacto</a>
            </li>
            @if (Route::has('login'))
              @auth
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="{{ url('/home') }}">Home</a>
                </li>
              @else
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a>
                </li>
                <!--<li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a>
                </li>-->
              @endauth
               
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Bienvenido a SystemDoc!</div>
          <div>
            <h5>Medica Social “San Antonio de Padua” ofrece:
            rayos x,
            estudios de sangre y orina,
            electrocardiograma,
            curaciones de pie diabético,
            ginecólogo,
            cardiólogo,
            cirujano,
            anestesiólogo,
            quiropráctico,
            venta de medicamentos de patente y
            venta de material de curación.</h5></div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#about">Cuentame más</a>
        </div>
      </div>
    </header>

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Acerca de nosotros</h3>
        </header>

        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="img/about-mission.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Misión</a></h2>
              <p>
                Somos una institución que busca brindar a nuestros pacientes salud integral a través atención médica segura, eficiente y con calidez, apoyados con alta tecnología y basados en trabajo en equipo con profesionales de gran calidad humana, esforzándonos en superar las expectativas de nuestros pacientes y usuarios.¡Brindamos Calidad de Vida!
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="img/about-plan.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Valores</a></h2>
              <p>
                •	Dignidad
                •	Seguridad
                •	Honestidad
                •	Trabajo en equipo
                •	Lealtad
                •	Empatía
                •	Excelencia
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="img/about-vision.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Visión</a></h2>
              <p>
                Alcanzar el liderazgo en la prestación de servicios médico-hospitalarios en la zona, a través de servicios de alta tecnología y gran calidad que permitan cubrir las demandas existentes en materia de salud en la sociedad, utilizando la mejora continua sistemática en todos los procesos de atención.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->


    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Principales áreas</h3>
          <p>Áreas médicas, áreas quirúrgicas, áreas de diagnóstico y apoyo clínico.</p>
        </header>

        <div class="row">

          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
         
            <h4 class="title"><a href="">Medicina interna</a></h4>
            <p class="description">Es una especialidad médica que se encarga de la atención integral del adulto, así como del diagnóstico y tratamiento no quirúrgico y la prevención de las enfermedades en especial la diabetes.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
        
            <h4 class="title"><a href="">Anestesiología</a></h4>
            <p class="description">Encargada de realizar la atención especializada en anestesia.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            
            <h4 class="title"><a href="">Urgencias</a></h4>
            <p class="description">Es facilitar el acceso de los pacientes y familiares, cumplimentar la faceta administrativa, facilitar un lugar de espera para la familia y proporcionar la información necesaria.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
         
            <h4 class="title"><a href="">Cirugia general</a></h4>
            <p class="description">Es un área dentro del Hospital donde se opera, o se interviene quirúrgicamente, a los pacientes. Funciona las 24 horas del día, los siete días de la semana y allí se atienden intervenciones programadas o de urgencia, con internación o ambulatorias.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            
            <h4 class="title"><a href="">Radiodiagnóstico</a></h4>
            <p class="description">Se encarga de controlar, supervisar, fiscalizar el uso de los equipos de rayos-x o equipos generadores de radiaciones ionizantes utilizados en el diagnóstico médico no invasivo que ayuda en los procedimientos que comprenden intervenciones diagnósticas y/o terapéuticas.</p>
          </div>

        </div>

      </div>
    </section><!-- #services -->

    <!-- History -->
    <section id="history" style="padding-top: 60px;padding-bottom:60px;">
      <div class="container">
        <header class="section-header wow fadeInUp">
          <h3>Historia</h3>
          <p>Acontecimientos importantes acerca de la clinica.</p>
        </header>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>5 de junio de 2003</h4>
                    <h4 class="subheading">La salud siempre ha sido fundamental.</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">El doctor Adrián Hernández Hernández basado en su conocimiento sobre el sector salud tomo la decisión de crear una clínica que poco a poco fue creciendo a lo largo de los años con los mejores médicos de la zona la cual fue fundada el 5  de junio de 2003 con el nombre de clínica san Antonio de Padua</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Junio 2003</h4>
                    <h4 class="subheading">Los primeros servicios médicos.</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Estos fueron prestados por el doctor Adrián  Hernández  Hernández, iniciándose de esta manera el funcionamiento del hospital San Antonio de Padua, posteriormente se fueron incorporando el medico Mario Delegan  quedando como supervisor de áreas.</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>17 de marzo de 2007 </h4>
                    <h4 class="subheading">Después de un tiempo de funcionamiento.</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Se logra la colaboración con la clínica Intermédica, (marca registrada Médica Ideas S.A. de C.V.) el 17 marzo 2007 el cual es un centro hospitalario de vanguardia que atiende las leyes y normas que rigen al sector salud.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <h4>Se parte
                    <br>de nuestra
                    <br>Historia!</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Equipo</h3>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="img/photo-64-1.jpg" class="img-fluid" alt="" style="width: 210px; height: 210px;">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="img/photo-64-2.jpg" class="img-fluid" alt="" style="width: 210px; height: 210px;">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="img/photo-64-3.jpg" class="img-fluid" alt="" style="width: 210px; height: 210px;">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="img/photo-64-4.jpg" class="img-fluid" alt="" style="width: 210px; height: 210px;">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #team -->

    <!-- Galery -->
    <section id="testimonials" class="section-bg wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Galería</h3>
        </header>

        <div class="owl-carousel testimonials-carousel">

          <div class="testimonial-item">
            <img src="img/clinica.jpg" class="testimonial-img" alt="" style="width: 510px; height: 210px;">
           
          </div>

          <div class="testimonial-item">
            <img src="img/clinica1.jpg" class="testimonial-img" alt="" style="width: 510px; height: 210px;">
            
          </div>

          <div class="testimonial-item">
            <img src="img/clinica2.jpg" class="testimonial-img" alt="" style="width: 510px; height: 210px;">
            
          </div>

          <div class="testimonial-item">
            <img src="img/clinica3.jpg" class="testimonial-img" alt="" style="width: 510px; height: 210px;">
            
          </div>

        </div>

      </div>
    </section><!-- #testimonials -->

    <section id="mapa" style="padding-top: 60px;padding-bottom:60px;">
      <div class="container">
        <div class="section-header">
          <h3>Ubicación</h3>
          <p>Ubicación geografica de la unidad Medica Social “San Antonio de Padua”.</p>
        </div>
        <div id="map" style="width:100%;height:500px;">
        </div>
        <script>
          function initMap() {
            var uluru = {lat: 20.3701171, lng: -99.0533118};
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 15,
              center: uluru
            });
            var marker = new google.maps.Marker({
              position: uluru,
              map: map
            });
          }
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBifrI2VLqdL2mhMLSfZ-mg5cF9x4-t5Ls&callback=initMap">
        </script>
          <center><button class="btn btn-primary"><a href="https://www.google.com/maps/dir/?api=1&destination=Medical%20social%20San%20Antonio%20de%20Padua" target="_blank">Generar ruta a la clinica</a></button></center>
      </div>
    </section>

     <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container">

        <div class="section-header">
          <h3>Contactanos</h3>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Dirección</h3>
              <address>Av. constituyentes No.4
                Colonia 2 Manzana, Patria Nueva Santiago de Anaya, Hidalgo.</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Telefono</h3>
              <p><a href="">Tel: 7727284193
                Tel cel: 7721676725</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">info@example.com</a></p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- #contact -->
   


    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; SystemDoc website 2021</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#" style="color:#000;">Politica de privacidad</a>
              </li>
              <li class="list-inline-item">
                <a href="#" style="color:#000;">Terminos de uso</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Carrousel -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/superfish/hoverIntent.js"></script>
    <script src="lib/superfish/superfish.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
    
    <script src="js/main.js"></script>
    <!-- Custom scripts for this template -->
    <script src="assets/js/agency.min.js"></script>
    

    <!-- Carousel -->
    <script>     
       
      $(document).ready(function(){

          /* Auto play bootstrap carousel 
          * http://stackoverflow.com/questions/13525258/twitter-bootstrap-carousel-autoplay-on-load
          -----------------------------------------------------------------------------------------*/                
          $('.carousel').carousel({
            interval: 3000
          })

          /* Enable swiping carousel for tablets and mobile
           * http://lazcreative.com/blog/adding-swipe-support-to-bootstrap-carousel-3-0/
           ---------------------------------------------------------------------------------*/
          if($(window).width() <= 991) {
              $(".carousel-inner").swipe( {
                  //Generic swipe handler for all directions
                  swipeLeft:function(event, direction, distance, duration, fingerCount) {
                      $(this).parent().carousel('next'); 
                  },
                  swipeRight: function() {
                      $(this).parent().carousel('prev'); 
                  },
                  //Default is 75px, set to 0 for demo so any distance triggers swipe
                  threshold:0
              });
          }  

          /* Handle window resize */
          $(window).resize(function(){
              if($(window).width() <= 991) {
                  $(".carousel-inner").swipe( {
                      //Generic swipe handler for all directions
                      swipeLeft:function(event, direction, distance, duration, fingerCount) {
                          $(this).parent().carousel('next'); 
                      },
                      swipeRight: function() {
                          $(this).parent().carousel('prev'); 
                      },
                      //Default is 75px, set to 0 for demo so any distance triggers swipe
                      threshold:0
                  });
               }
          });                             
      });

  </script> 

  </body>

</html>
