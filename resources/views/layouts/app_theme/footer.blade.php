      <!-- ==== footer ==== -->
      <footer class="bg-secondary text-light">
        <div class="container">
           <!-- row -->
           <div class="row">
              <div class="col-lg-6 text-center">
                 <!-- logo -->
                 <img src="{{asset('theme_assets/img/logo_light.png')}}" class="img-fluid" alt="" style="width: 130px;height: 130px; border-radius: 10px"/>
                 <p class="mt-3">
                  Digital School 
                  {{__('site.digital_school_description')}}
                  .
                 </p>
              </div>
              <!--/ col-lg -->
              <div class="col-lg-6 text-center res-margin">
                 <h5>{{__('site.contact_us')}}</h5>
                 <ul class="list-unstyled mt-3">
                    <li class="mb-1"><i class="fas fa-phone margin-icon "></i>(123) 456-789</li>
                    <li class="mb-1"><i class="fas fa-envelope margin-icon"></i><a href="mailto:email@yoursite.com">hello@digitalschool.com</a></li>
                    <li><i class="fas fa-map-marker margin-icon"></i>{{__('site.digital_school_address')}} </li>
                 </ul>
                 <!--/ul -->
                 <!-- Start Social Links -->
                 <ul class="social-list text-center list-inline mt-2">
                    <li class="list-inline-item"><a title="Facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a title="Twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a  title="Instagram" href="#"><i class="fab fa-instagram"></i></a></li>
                 </ul>
                 <!-- /End Social Links -->
              </div>

           </div>
           <!--/ row-->
           <hr/>
           <div class="row">
              <div class="credits col-sm-12 text-center">
               {{__('site.all_rights_reserved')}} &copy; {{date('Y') }}
              </div>
           </div>
           <!--/row-->
        </div>
        <!--/ container -->
        <!-- Go To Top Link -->
        <div class="page-scroll hidden-sm hidden-xs">
           <a href="#top" class="back-to-top"><i class="fa fa-angle-up"></i></a>
        </div>
        <!--/page-scroll-->
     </footer>
     <!--/ footer-->