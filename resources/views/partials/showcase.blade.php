<div class="container-fluid p-0">
  <div id="slider" class="parallax-slider" style="width:1200px;margin:0 auto;margin-bottom: 0px;">
      <div class="ls-slide" data-ls="duration:4000; transition2d:7;">
        <img src=" {{asset('theme_assets/img/showcase.jpg')}} " class="ls-bg" alt="" />
        {{-- https://unsplash.com/photos/person-holding-pencil-near-laptop-computer-5fNmWej4tAA?utm_content=creditShareLink&utm_medium=referral&utm_source=unsplash --}}

        <div class="ls-l header-wrapper">
            <div class="header-text" style="color: #fff">
              <span style="color: {{App::getLocale() == 'ar' ? '#000' : '#fff'}}">{{__('site.welcome_to')}}</span> 
              <h1 style="color: #64c5e8"> {{__('site.digital_school')}}</h1>

              <!--the div below is hidden on small screens  -->
              <div class="hidden-small">
                  <p class="header-p">
                    {{__('site.what_we_offer')}}
                  </p>
                  <a class="btn btn-secondary" href="#courses">{{__('site.start_learning')}}</a>
              </div>
              <!--/hidden-small -->
            </div>
        </div>
      </div>
  </div>
</div>