@extends('layouts.dashboard_theme.default')

@section('content')
  <h1>Students</h1>
  <table class="table table-bordered mt-3" id="students-table">
    <thead class="table-primary">
      <tr>
        <td>#</td>
        <td>Name</td>
        <td>Email</td>
        <td>Registration Date</td>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @php $i = 1; @endphp
      @forelse($students as $student)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$student->name}}</td>
        <td>{{$student->email}}</td>
        <td>{{$student->created_at->diffForHumans()}}</td>
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
      $('#students-table').DataTable({
        responsive: true
      });
  });
  function confirmDelete() {
        return confirm("Are you sure you want to delete this student?");
      }
    </script>
@endsection