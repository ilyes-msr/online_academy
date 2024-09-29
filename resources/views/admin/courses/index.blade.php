@extends('layouts.dashboard_theme.default')

@section('content')
  <h1>{{__('site.courses')}}</h1>
  <a href="{{route('courses.create')}}" class="btn btn-primary">{{__('site.add_a_course')}}</a>
  <table class="table table-bordered mt-3" id="courses-table">
    <thead class="table-primary">
      <tr>
        <td>#</td>
        <td>{{__('site.image')}}</td>
        <td>{{__('site.title')}}</td>
        <td>{{__('site.category')}}</td>
        <td>{{__('site.published')}}</td>
        <td>{{__('site.price')}}</td>
        <td>{{__('site.actions')}}</td>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @php $i = 1; @endphp
      @forelse($courses as $course)
      <tr>
        <td>{{$i++}}</td>
        <td><img src="{{ asset('storage/' . $course->image_path)}}" alt="course image" class="img-fluid" style="width: 75px;"></td>
        <td>{{$course->title}}</td>
        <td>{{$course->category->name}}</td>
        <td>{{$course->published ? __('site.yes') : __('site.no')}}</td>
        <td>{{$course->price}}</td>
        <td>
          <br><br><br>
          <a href="{{route('materials.index', $course->id)}}" class="btn btn-info" title="Add Content"><i class="las la-plus"></i> <small>{{__('site.add_content')}}</small></a>

          <a href="{{route('courses.edit', $course)}}" class="btn btn-warning mx-1" title="Edit"><i class="las la-edit"></i></a> 

          <form action="{{route('courses.destroy', $course)}}" method="post" onsubmit="return confirmDelete()">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger ml-1" title="Delete"><i class="las la-trash-alt"></i></button>
          </form>
        </td>
      </tr>
      @empty  
      <tr></tr>
      @endforelse
    </tbody>
  </table>
@endsection

@section('scripts')
  <script src="https://cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json"></script>

  <script>  
  $(document).ready( function () {
      $('#courses-table').DataTable({
        responsive: true,
        @if(App::getLocale() == 'ar')
          "language": {"url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json"}
        @endif
      });
  });
  function confirmDelete() {
        return confirm("{{__('site.are_you_sure_you_want_to_delete_this_item')}}");
      }
    </script>
@endsection
