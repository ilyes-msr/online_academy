@extends('layouts.dashboard_theme.default')

@section('content')
  <h1>Articles</h1>
  <a href="{{route('articles.create')}}" class="btn btn-outline-primary">Add an article</a>
  <table class="table table-bordered mt-3" id="articles-table">
    <thead class="table-primary">
      <tr>
        <td>#</td>
        <td>Image</td>
        <td>Title</td>
        <td>Views</td>
        <td>Actions</td>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @php $i = 1; @endphp
      @forelse($articles as $article)
      <tr>
        <td>{{$i++}}</td>
        <td><img src="{{ asset('storage/' . $article->image_path)}}" alt="article image" class="img-fluid" style="width: 75px;"></td>
        <td>{{$article->title}}</td>
        <td>{{$article->nb_views}}</td>
        <td>
          <br><br><br>

          <a href="{{route('articles.edit', $article)}}" class="btn btn-warning ml-1" title="Edit"><i class="las la-edit"></i></a> 

          <form action="{{route('articles.destroy', $article)}}" method="post" onsubmit="return confirmDelete()">
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
      $('#articles-table').DataTable({
        responsive: true
      });
      
  });
  function confirmDelete() {
        return confirm("Are you sure you want to delete this article?");
      }
    </script>
@endsection