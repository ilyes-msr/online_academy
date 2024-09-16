
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
           <img src="{{asset('theme_assets/img/logo.png')}}" alt="" class="img-fluid" style="max-height: 86px;">
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
                    <a class="nav-link" href="{{url('/')}}">{{__('site.home')}}
                    </a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">
                      {{__('site.courses')}}
                    </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/')}}">
                    {{__('site.blog')}}
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/')}}">
                    {{__('site.login')}}
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/')}}">
                    {{__('site.register')}}
                  </a>
                </li>
                 <!-- menu item -->
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="others-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{__('site.language')}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="others-dropdown">

                       <a class="dropdown-item {{ App::getLocale() == 'ar' ? 'active-language' : '' }}" href="{{ App::getLocale() == 'ar' ? '#' : route('lang.switch', ['locale' => 'ar']) }}">
                        العربية
                       </a>
                       <a class="dropdown-item {{ App::getLocale() == 'en' ? 'active-language' : '' }}" href="{{ App::getLocale() == 'en' ? '#' : route('lang.switch', ['locale' => 'en']) }}">
                        English
                       </a>
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