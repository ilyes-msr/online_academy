
<nav id="main-nav" class="navbar-expand-xl fixed-top">
  <div class="row">
     <!-- Start Top Bar -->
     <div class="container-fluid top-bar" >
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <!-- Start Contact Info -->
                 <ul class="contact-details float-left">
                    <li><i class="fa fa-map-marker"></i>Street name 123 - New York</li>
                    <li><i class="fa fa-envelope"></i><a href="mailto:email@site.com">email@yoursite.com</a></li>
                    <li><i class="fa fa-phone"></i>(123) 456-789</li>
                 </ul>
                 <!-- End Contact Info -->
                 <!-- Start Social Links -->
                 <ul class="social-list float-right list-inline">
                    <li class="list-inline-item"><a title="Facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a title="Twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a  title="Instagram" href="#"><i class="fab fa-instagram"></i></a></li>
                 </ul>
                 <!-- /End Social Links -->
              </div>
              <!-- col-md-12 -->
           </div>
           <!-- /row -->
        </div>
        <!-- /container -->
     </div>
     <!-- End Top bar -->
     <!-- Navbar Starts -->
     <div class="navbar container-fluid">
        <div class="container ">
           <!-- logo -->
           <a class="nav-brand" href="{{url('/')}}">
           <img src="{{asset('theme_assets/img/logo.png')}}" alt="" class="img-fluid">
           </a>
           <!-- Navbar toggler -->
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggle-icon">
           <i class="fas fa-bars"></i>
           </span>
           </button>
           <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                 <!-- menu item -->
                 <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home
                    </a>
                 </li>
                 <!-- menu item -->
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="services-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Services
                    </a>
                    <div class="dropdown-menu" aria-labelledby="services-dropdown">
                       <a class="dropdown-item" href="services.html">Services Style 1</a>
                       <a class="dropdown-item" href="services2.html">Services Style 2</a>
                       <a class="dropdown-item" href="services-single.html">Services Single</a>
                    </div>
                 </li>
                 <!-- menu item -->
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="about-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    About
                    </a>
                    <div class="dropdown-menu" aria-labelledby="about-dropdown">
                       <a class="dropdown-item" href="about.html">About Style 1</a>
                       <a class="dropdown-item" href="about2.html">About Style 2</a>
                       <a class="dropdown-item" href="team.html">Our Team</a>
                       <a class="dropdown-item" href="team-single.html">Team Single Page</a>
                       <a class="dropdown-item" href="careers.html">Careers</a>
                       <a class="dropdown-item" href="pricing.html">Pricing</a>
                    </div>
                 </li>
                 <!-- menu item -->
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="gallery-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gallery
                    </a>
                    <div class="dropdown-menu" aria-labelledby="gallery-dropdown">
                       <a class="dropdown-item" href="gallery.html">Gallery Style 1</a>
                       <a class="dropdown-item" href="gallery2.html">Gallery Style 2</a>
                       <a class="dropdown-item" href="gallery3.html">Gallery Style 3</a>
                    </div>
                 </li>
                 <!-- menu item -->
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="contact-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Contact
                    </a>
                    <div class="dropdown-menu" aria-labelledby="contact-dropdown">
                       <a class="dropdown-item" href="contact.html">Contact Style 1</a>
                       <a class="dropdown-item" href="contact2.html">Contact Style 2</a>
                       <a class="dropdown-item" href="contact3.html">Contact Style 3</a>
                    </div>
                 </li>
                 <!-- menu item -->
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="others-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{__('site.language')}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="others-dropdown">

                       <a class="dropdown-item {{ App::getLocale() == 'ar' ? 'active-language' : '' }}" href="{{ App::getLocale() == 'ar' ? '#' : route('lang.switch', ['locale' => 'ar']) }}">
                        {{__('site.arabic')}}
                       </a>
                       <a class="dropdown-item {{ App::getLocale() == 'en' ? 'active-language' : '' }}" href="{{ App::getLocale() == 'en' ? '#' : route('lang.switch', ['locale' => 'en']) }}">{{__('site.english')}}</a>
                    </div>
                 </li>
              </ul>
              <!--/ul -->
           </div>
           <!--collapse -->
        </div>
        <!-- /container -->
     </div>
     <!-- /navbar -->
  </div>
</nav>