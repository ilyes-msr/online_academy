<div class="sidebar"">
  <div class="sidebar-brand">
    <h2>        
      <img src="{{asset('theme_assets/img/logo.png')}}" alt="" style="width: 49px; border-radius: 10px">
    </h2>
  </div>
  <div class="sidebar-menu">
    <ul>
      <li>
        <a href="{{route('admin.dashboard')}}" class="{{request()->is('admin/dashboard') ? 'active' : ''}}">
          <span class="las la-igloo"></span>
          <span>{{__('site.dashboard')}}</span>
        </a>
      </li>
      <li>
        <a href="{{route('categories.index')}}" class="{{request()->is('admin/categories*') ? 'active' : ''}}">
          <span class="las la-braille"></span>
          <span>{{__('site.categories')}}</span>
        </a>
      </li>
      <li>
        <a href="{{route('courses.index')}}" class="{{request()->is('admin/courses*') ? 'active' : ''}}">
          <span class="las la-school"></span>
          <span>{{__('site.courses')}}</span>
        </a>
      </li>
      <li>
        <a href="{{route('articles.index')}}" class="{{request()->is('admin/articles*') ? 'active' : ''}}">
          <span class="las la-pen-nib"></span>
          <span>{{__('site.articles')}}</span>
      </a>
      </li>
      <li>
        <a href="{{route('students')}}" class="{{request()->is('admin/students*') ? 'active' : ''}}"><span class="las la-user-graduate"></span>
        <span>{{__('site.students')}}</span></a>
      </li>
  
    </ul>
  </div>
</div>
