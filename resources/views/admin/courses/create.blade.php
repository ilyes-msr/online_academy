@extends('layouts.dashboard_theme.default')

@section('content')
<a href="{{route('courses.index')}}" class="btn btn-secondary"> <i class="las la-arrow-left"></i> Back</a>

  <h3 class="my-3">Create New Course</h3>

  <form action="{{route('courses.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Course Title" name="title" value="{{old('title')}}" id="title">
    </div>
    @error('title')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror

    <div class="mb-3">
      <label for="category_id">Category</label>
      <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
        <option value="">Choose a category</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}" {{$category->id == old('category_id') ? 'selected' : ''}}>       {{$category->name}}
        </option>
        @endforeach
      </select>
    </div>
    @error('category_id')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror

    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Course Description">{{old('description')}}</textarea>
    </div>
    @error('description')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror

    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Enter Course Price" value="{{old('price')}}">
    </div>
    @error('price')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror

    <div class="mb-3">
      <label for="image_path" class="form-label">Image</label>
      <input type="file" name="image_path" id="image_path" class="form-control @error('image_path') is-invalid @enderror" accept="image/*">{{old('image_path')}}
    </div>
    @error('image_path')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror
    <img id="imagePreview" src="" alt="Image Preview" style="max-width: 300px; display: none; margin-bottom: 10px">
    <p id="errorMsg" style="color: red; display: none;">Error ! <br>File size exceeds 4 MB.</p>

    <button type="submit" class="btn btn-primary">Add</button>
  </form>

@endsection

@section('scripts')
<script>
  const imageInput = document.getElementById('image_path');
  const imagePreview = document.getElementById('imagePreview');
  const errorMsg = document.getElementById('errorMsg');

  imageInput.addEventListener('change', function() {
      const file = this.files[0];
      const maxSize = 4 * 1024 * 1024; // 4 MB in bytes
      
      // Reset previous states
      imagePreview.src = "";
      imagePreview.style.display = "none";
      errorMsg.style.display = "none";

      if (file) {
          // Check file size
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