  <div class="container-fluid p-0">
  <!-- Parallax Slider -->
  <div id="slider" class="parallax-slider" style="width:1200px;margin:0 auto;margin-bottom: 0px;">
      <!-- Slide 1 -->
      <div class="ls-slide" data-ls="duration:4000; transition2d:7;">
        <!-- background image  -->
        <img src=" {{asset('theme_assets/img/showcase.jpg')}} " class="ls-bg" alt="" />
        {{-- https://unsplash.com/photos/person-holding-pencil-near-laptop-computer-5fNmWej4tAA?utm_content=creditShareLink&utm_medium=referral&utm_source=unsplash --}}
        <!-- clouds  -->
        <img  src="{{asset('theme_assets/img/slider/parallaxslider/clouds.png')}}" class="ls-l" alt="" style="top:56px;left:-100px;" data-ls="parallax:true; parallaxlevel:-5;">
        

        <!-- text  -->
        <div class="ls-l header-wrapper" data-ls="offsetyin:150; durationin:700; delayin:200; easingin:easeOutQuint; rotatexin:20; scalexin:1.4; offsetyout:600; durationout:400;">
            <div class="header-text" style="color: white">
              <span style="color: #fff">Welcome to</span> 
              <h1 style="color: #64c5e8"> Digital School</h1>
              <!--the div below is hidden on small screens  -->
              <div class="hidden-small">
                  <p class="header-p">We offer high quality courses on web development, data science and cloud computing</p>
                  <a class="btn btn-secondary" href="contact.html">Start Learning</a>
              </div>
              <!--/hidden-small -->
            </div>
            <!-- header-text  -->
        </div>
        <!-- ls-l  -->
      </div>
      <!-- ls-slide -->
  </div>
  <!-- /slider -->
  <svg version="1.1" id="divider"  class="slider-divider" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
      viewBox="0 0 1440 126" preserveAspectRatio="none slice" xml:space="preserve">
      <path class="st0" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
  </svg>
</div>
<!-- /container-fluid -->
