@extends('layouts.dashboard_theme.default')

@section('content')


@include('admin.back_link', ['destination' => 'courses'])

  <h3 class="my-3">{{__('site.edit_course_info')}}</h3>

  <form action="{{route('courses.update', $course)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title">{{__('site.title')}}</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="{{__('site.enter_course_title')}}" name="title" value="{{$course->title}}" id="title">
    </div>
    @error('title')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror

    <div class="mb-3">
      <label for="category_id">{{__('site.category')}}</label>
      <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
        <option value="">{{__('site.choose_a_category')}}</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}" {{$category->id == $course->category_id ? 'selected' : ''}}>       {{$category->name}}
        </option>
        @endforeach
      </select>
    </div>
    @error('category_id')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror

    <div class="mb-3">
      <label for="description" class="form-label">{{__('site.description')}}</label>
      <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="{{__('site.enter_course_description')}}">{{$course->description}}</textarea>
    </div>
    @error('description')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror

    <div class="mb-3">
      <label for="price" class="form-label">{{__('site.price')}}</label>
      <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="{{__('site.enter_course_price')}}" value="{{$course->price}}">
    </div>
    @error('price')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror

    <div class="mb-3">
      <label for="published">{{__('site.publish_the_course')}}</label>
      <select name="published" id="published" class="form-select @error('published') is-invalid @enderror">
        <option value="">{{__('site.choose')}}</option>
        <option value="1" {{$course->published == 1 ? 'selected' : ''}}>{{__('site.yes')}}</option>
        <option value="0" {{$course->published == 0 ? 'selected' : ''}}>{{__('site.no')}}</option>
      </select>
    </div>
    @error('published')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror


    <div class="mb-3">
      <label for="image_path" class="form-label">{{__('site.upload_a_new_image_optional')}}</label>
      <input type="file" name="image_path" id="image_path" class="form-control @error('image_path') is-invalid @enderror" accept="image/*">
    </div>
    @error('image_path')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror
    <img id="imagePreview" src="{{ asset('storage/' . $course->image_path)}}" alt="Image Preview" style="max-width: 300px; display: block; margin-bottom: 10px">
    <p id="errorMsg" style="color: red; display: none;">{{__('site.error')}} ! <br>{{__('site.file_size_exceeds_4_mb')}}.</p>

    <button type="submit" class="btn btn-primary">{{__('site.edit')}}</button>
  </form>

@endsection

@section('scripts')
<script>
  const imageInput = document.getElementById('image_path');
  const imagePreview = document.getElementById('imagePreview');
  const errorMsg = document.getElementById('errorMsg');

  imageInput.addEventListener('change', function() {
      const file = this.files[0];
      const maxSize = 4 * 1024 * 1024;
      
      imagePreview.src = "";
      imagePreview.style.display = "none";
      errorMsg.style.display = "none";

      if (file) {
        
          if (file.size > maxSize) {
              errorMsg.style.display = "block";
          } else {
              const reader = new FileReader();
              reader.onload = function(e) {
                  imagePreview.src = e.target.result;
                  imagePreview.style.display = "block";
              }
              reader.readAsDataURL(file);
          }
      }
  });
</script>
@endsection