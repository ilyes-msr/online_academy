
<nav id="main-nav" class="navbar-expand-xl fixed-top">
  <div class="row">
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
              <ul class="navbar-nav {{App::getLocale() == 'ar' ? 'mr-auto' : 'ml-auto'}}">
                 <!-- menu item -->
                 <li class="nav-item {{request()->is('/') ? 'active' : ''}}">
                    <a class="nav-link" href="{{url('/')}}">{{__('site.home')}}
                    </a>
                 </li>
                 <li class="nav-item {{request()->is('courses') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('courses')}}">
                      {{__('site.courses')}}
                    </a>
                </li>
                <li class="nav-item {{request()->is('articles') ? 'active' : ''}}">
                  <a class="nav-link" href="{{route('articles')}}">
                    {{__('site.blog')}}
                  </a>
                </li>
                @guest
                <li class="nav-item">
                  <a class="nav-link" href="{{route('login')}}">
                    {{__('site.login')}}
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('register')}}">
                    {{__('site.register')}}
                  </a>
                </li>
                @endguest
                @auth

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="others-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     {{ auth()->user()->name}}
                  </a>
                  <div class="dropdown-menu pb-1">
                     @admin
                        <a class="nav-link custom-dropdown-link" target="_blank" href="{{route('admin.dashboard')}}">
                           {{__('site.dashboard')}}
                        </a>
                     @endadmin
                     <a class="nav-link custom-dropdown-link" href="{{route('courses.mine')}}">
                        {{__('site.my_courses')}}
                     </a>
                     <a class="nav-link custom-dropdown-link" href="{{route('profile.show')}}">
                        {{__('site.profile')}}
                     </a>
                     <form method="POST" action="{{ route('logout') }}" class="text-center">
                        @csrf
                        <button type="submit" id="logout-btn" class="nav-link custom-dropdown-link">{{__('site.logout')}}</button>
                    </form>
                  </div>
               </li>
                @endauth
                 <!-- menu item -->
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="others-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fa fa-language"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="others-dropdown">

                       <a class="dropdown-item {{ App::getLocale() == 'ar' ? 'active-language text-right' : '' }}" href="{{ App::getLocale() == 'ar' ? '#' : route('lang.switch', ['locale' => 'ar']) }}">
                        العربية
                       </a>
                       <a class="dropdown-item {{ App::getLocale() == 'en' ? 'active-language' : 'text-right' }}" href="{{ App::getLocale() == 'en' ? '#' : route('lang.switch', ['locale' => 'en']) }}">
                        English
                       </a>
                    </div>
                 </li>
              </ul>
              <!--/ul -->
           </div>
           <!--collapse -->
        </div>
     </div>
  </div>
</nav>