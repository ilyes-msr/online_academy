@extends('layouts.dashboard_theme.default')

@section('content')
  <h1>Courses</h1>
  <a href="{{route('courses.create')}}" class="btn btn-outline-primary">Add a course</a>
  <table class="table table-bordered mt-3" id="courses-table">
    <thead class="table-primary">
      <tr>
        <td>#</td>
        <td>Image</td>
        <td>Title</td>
        <td>Category</td>
        <td>Published</td>
        <td>Price</td>
        <td>Actions</td>
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
        <td>{{$course->published ? 'Yes' : 'No'}}</td>
        <td>{{$course->price}}</td>
        <td>
          <br><br><br>
          <a href="{{route('materials.index', $course->id)}}" class="btn btn-info" title="Add Content"><i class="las la-plus"></i> <small>Add Content</small></a>

          <a href="{{route('courses.edit', $course)}}" class="btn btn-warning ml-1" title="Edit"><i class="las la-edit"></i></a> 

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
  <script>
  
  $(document).ready( function () {
      $('#courses-table').DataTable({
        responsive: true
      });
      
  });
  function confirmDelete() {
        return confirm("Are you sure you want to delete this course?");
      }
    </script>
@endsection