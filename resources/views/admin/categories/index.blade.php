@extends('layouts.dashboard_theme.default')

@section('content')
  <h1>Categories</h1>
  <a href="{{route('categories.create')}}" class="btn btn-outline-primary">Add a category</a>
  <table class="table table-bordered mt-3" id="categories-table">
    <thead class="table-primary">
      <tr>
        <td>#</td>
        <td>Name</td>
        <td>Actions</td>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @php $i = 1; @endphp
      @foreach($categories as $category)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$category->name}}</td>
        <td>
          <a href="{{route('categories.edit', $category)}}" class="btn"><i class="las la-edit"></i></a>
          <form action="{{route('categories.destroy', $category)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit"><i class="las la-trash-alt"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('scripts')
  <script>
  
$(document).ready( function () {
    $('#categories-table').DataTable();
} );
    </script>
@endsection