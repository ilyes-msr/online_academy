@extends('layouts.dashboard_theme.default')

@section('content')
  <h3>{{__('site.materials_for_the_course')}}: {{$course->title}}</h3>
  <a href="{{route('materials.create', $course->id)}}" class="btn btn-primary mt-3">{{__('site.add_a_material')}}</a>
  <table class="table table-bordered mt-3" id="materials-table">
    <thead class="table-primary">
      <tr>
        <td>#</td>  
        <td>{{__('site.title')}}</td>
        <td>{{__('site.video_link')}}</td>
        <td>{{__('site.actions')}}</td>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @php $i = 1; @endphp
      @forelse($materials as $material)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$material->title}}</td>
        <td>{{$material->video_path}}</td>
        <td>
          <br><br><br>

          <a href="{{route('materials.edit', ['course_id' => $course->id, 'material' => $material])}}" class="btn btn-warning ml-1" title="Edit"><i class="las la-edit"></i></a> 

          <form action="{{route('materials.destroy', ['course_id' => $course->id, 'material' => $material])}}" method="post" onsubmit="return confirmDelete()">
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
      $('#materials-table').DataTable({
        responsive: true,
        @if(App::getLocale() == 'ar')
          "language": {"url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json"}
        @endif
      });
  });
  
  function confirmDelete() 
  {
    return confirm("{{__('site.are_you_sure_you_want_to_delete_this_item')}}");
  }
  </script>
@endsection