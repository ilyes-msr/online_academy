@extends('layouts.dashboard_theme.default')

@section('styles')
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap');

@media print {
	body {
		margin: 0 !important;
	}
}

.main-container {
	font-family: 'Lato';
	width: fit-content;
	margin-left: auto;
	margin-right: auto;
}

.ck-content {
	font-family: 'Lato';
	line-height: 1.6;
	word-break: break-word;
}

.editor-container_classic-editor .editor-container__editor {
	min-width: 795px;
	max-width: 795px;
}
  </style>
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.css">
@endsection

@section('content')
@include('admin.back_link', ['destination' => 'articles'])

  <h3 class="my-3">{{__('site.edit_article')}}</h3>

  <form action="{{route('articles.update', $article->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title">{{__('site.title')}}</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="{{__('site.enter_article_title')}}" name="title" value="{{$article->title}}" id="title">
    </div>
    @error('title')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror

    <div class="mb-3">
      <label for="image_path" class="form-label">{{__('site.upload_a_new_image_optional')}}</label>
      <input type="file" name="image_path" id="image_path" class="form-control @error('image_path') is-invalid @enderror" accept="image/*">
    </div>
    @error('image_path')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror
    <img id="imagePreview" src="{{ asset('storage/' . $article->image_path)}}" alt="Image Preview" style="max-width: 300px; display: block; margin-bottom: 10px">
    <p id="errorMsg" style="color: red; display: none;">{{__('site.error')}} ! <br>{{__('site.file_size_exceeds_4_mb')}}.</p>

    <div class="mb-3">
      <label for="body">{{__('site.body')}}</label>
      <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror">{{$article->body}}</textarea>
    </div>
    @error('body')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror
    <button type="submit" class="btn btn-primary">{{__('site.edit')}}</button>  
  </form>

@endsection

@section('scripts')

  <script type="module">
  import {
	ClassicEditor,
	AccessibilityHelp,
	Autoformat,
	AutoImage,
	Autosave,
	BlockQuote,
	Bold,
	CloudServices,
	Essentials,
	Heading,
	ImageBlock,
	ImageCaption,
	ImageInline,
	ImageInsertViaUrl,
	ImageResize,
	ImageStyle,
	ImageTextAlternative,
	ImageToolbar,
	ImageUpload,
	Indent,
	IndentBlock,
	Italic,
	Link,
	LinkImage,
	List,
	ListProperties,
	MediaEmbed,
	Paragraph,
	PasteFromOffice,
	SelectAll,
	Table,
	TableCaption,
	TableCellProperties,
	TableColumnResize,
	TableProperties,
	TableToolbar,
	TextTransformation,
	TodoList,
	Underline,
	Undo
} from 'ckeditor5';
import coreTranslations from 'ckeditor5/translations/ar.js';

const editorConfig = {
	toolbar: {
		items: [
			'undo',
			'redo',
			'|',
			'heading',
			'|',
			'bold',
			'italic',
			'underline',
			'|',
			'link',
			'mediaEmbed',
			'insertTable',
			'blockQuote',
			'|',
			'bulletedList',
			'numberedList',
			'todoList',
			'outdent',
			'indent'
		],
		shouldNotGroupWhenFull: false
	},	
	@if(App::getLocale() == 'ar')
	language: {
		ui: 'ar',
		content: 'ar'
	},
	@endif
	plugins: [
		AccessibilityHelp,
		Autoformat,
		AutoImage,
		Autosave,
		BlockQuote,
		Bold,
		CloudServices,
		Essentials,
		Heading,
		ImageBlock,
		ImageCaption,
		ImageInline,
		ImageInsertViaUrl,
		ImageResize,
		ImageStyle,
		ImageTextAlternative,
		ImageToolbar,
		ImageUpload,
		Indent,
		IndentBlock,
		Italic,
		Link,
		LinkImage,
		List,
		ListProperties,
		MediaEmbed,
		Paragraph,
		PasteFromOffice,
		SelectAll,
		Table,
		TableCaption,
		TableCellProperties,
		TableColumnResize,
		TableProperties,
		TableToolbar,
		TextTransformation,
		TodoList,
		Underline,
		Undo
	],
	@if(App::getLocale() == 'ar')
		translations: [
							coreTranslations,
					],
	@endif
	heading: {
		options: [
			{
				model: 'paragraph',
				title: 'Paragraph',
				class: 'ck-heading_paragraph'
			},
			{
				model: 'heading1',
				view: 'h1',
				title: 'Heading 1',
				class: 'ck-heading_heading1'
			},
			{
				model: 'heading2',
				view: 'h2',
				title: 'Heading 2',
				class: 'ck-heading_heading2'
			},
			{
				model: 'heading3',
				view: 'h3',
				title: 'Heading 3',
				class: 'ck-heading_heading3'
			},
			{
				model: 'heading4',
				view: 'h4',
				title: 'Heading 4',
				class: 'ck-heading_heading4'
			},
			{
				model: 'heading5',
				view: 'h5',
				title: 'Heading 5',
				class: 'ck-heading_heading5'
			},
			{
				model: 'heading6',
				view: 'h6',
				title: 'Heading 6',
				class: 'ck-heading_heading6'
			}
		]
	},
	image: {
		toolbar: [
			'toggleImageCaption',
			'imageTextAlternative',
			'|',
			'imageStyle:inline',
			'imageStyle:wrapText',
			'imageStyle:breakText',
			'|',
			'resizeImage'
		]
	},
	link: {
		addTargetToExternalLinks: true,
		defaultProtocol: 'https://',
		decorators: {
			toggleDownloadable: {
				mode: 'manual',
				label: 'Downloadable',
				attributes: {
					download: 'file'
				}
			}
		}
	},
	list: {
		properties: {
			styles: true,
			startIndex: true,
			reversed: true
		}
	},

	
  table: {
		contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells', 'tableProperties', 'tableCellProperties']
	}

};

ClassicEditor.create(document.querySelector('#body'), editorConfig);

  </script>
  
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