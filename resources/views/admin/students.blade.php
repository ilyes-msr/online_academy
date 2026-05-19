@extends('layouts.dashboard_theme.default')

@section('content')
  <h1>{{__('site.students')}}</h1>
  <table class="table table-bordered mt-3" id="students-table">
    <thead class="table-primary">
      <tr>
        <td>#</td>
        <td>{{__('site.name')}}</td>
        <td>{{__('site.email')}}</td>
        <td>{{__('site.reg_date')}}</td>
        <td>{{__('site.nb_bought_courses')}}</td>
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
        <td>{{$student->courses->count()}}</td>
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
        responsive: true,
        @include('admin.partials.datatables-language')
      });
  });
  function confirmDelete() {
        return confirm("Are you sure you want to delete this student?");
      }
    </script>
@endsection