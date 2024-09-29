@extends('layouts.dashboard_theme.default')

@section('content')
  <h1>{{__('site.articles')}}</h1>
  <a href="{{route('articles.create')}}" class="btn btn-primary">{{__('site.add_an_article')}}</a>
  <table class="table table-bordered mt-3" id="articles-table">
    <thead class="table-primary">
      <tr>
        <td>#</td>
        <td>{{__('site.image')}}</td>
        <td>{{__('site.title')}}</td>
        <td>{{__('site.views')}}</td>
        <td>{{__('site.actions')}}</td>
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
<script src="https://cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json"></script>

  <script>
  $(document).ready( function () {
      $('#articles-table').DataTable({
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