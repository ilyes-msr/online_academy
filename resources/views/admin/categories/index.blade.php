@extends('layouts.dashboard_theme.default')

@section('content')
  <h1>{{__('site.categories')}}</h1>
  <a href="{{route('categories.create')}}" class="btn btn-primary">{{__('site.add_a_category')}}</a>
  <table class="table table-bordered mt-3" id="categories-table">
    <thead class="table-primary">
      <tr>
        <td>#</td>
        <td>{{__('site.name')}}</td>
        <td>{{__('site.actions')}}</td>
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
<script src="https://cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json"></script>

<script>
    $(document).ready(function () {
        $('#categories-table').DataTable({
            @if(App::getLocale() == 'ar')
                "language": {"url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json"}
            @endif
        });
    });
</script>
@endsection