@extends('layouts.dashboard_theme.default')

@section('content')
  <h1>Materials for the material: {{$course->title}}</h1>
  <a href="{{route('materials.create', $course->id)}}" class="btn btn-outline-primary">Add a material</a>
  <table class="table table-bordered mt-3" id="materials-table">
    <thead class="table-primary">
      <tr>
        <td>#</td>  
        <td>Title</td>
        <td>Video Link</td>
        <td>Actions</td>
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
  <script>
  
  $(document).ready( function () {
      $('#materials-table').DataTable({
        responsive: true
      });
  });
    function confirmDelete() {
          return confirm("Are you sure you want to delete this material?");
        }
    </script>
@endsection