@extends('master')

@section('content')


	<div class="row">
		<div class="col-md-12">
			@include('errors.list')
		</div>
	</div>

	@if(Auth::user()->id == $gallery->created_by)
	<div class="row">
		<div class="col-md-12">
			@include('flash.message')
			<form action="{{ action('GalleryController@updateGalleryName',$gallery->id) }}" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<label>Edit Gallery Name </label>
					<input type="text" name="gallery_name" value="{{ $gallery->gallery_name }}" class="form-control">
				</div>
				<button type="submit" class="btn btn-success">Update Name</button>
			</form>
		</div>
	</div>
	@endif

	<hr>
	<div class="row">
		<div class="col-md-12">
			<h1>{{ $gallery->gallery_name }}'s photo</h1>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-12">
			<div id="gallery-images">
			@if(count($gallery->images) > 0 )				
				@foreach($gallery->images as $photo)
					<a href="{{ url('gallery/images/' . $photo->path) }}" data-lightbox="roadtrip">
						<img src="{{ url('/gallery/images/' . $photo->path) }}">
					</a>
				@endforeach
			@else
				<h3>There is no photo yet!</h3>

			@endif
			</div>
		</div>
	</div>

	<hr>

	@if(Auth::user()->id == $gallery->created_by)
		<div class="row">
			<div class="col-md-12">
				<form action="{{ action('GalleryController@saveGalleryPhoto',$gallery->id) }}" method="POST" enctype='multipart/form-data'>
					{{ csrf_field() }}
						<label>Upload Your Photo</label>
						<input type="hidden" name="gallery_id" 
						value="{{ $gallery->id }}">
						<input type="file" name="images[]" multiple>
					
					<button type="submit" class="btn btn-primary">Upload Photo</button>
				</form>
			</div>
		</div>
	@endif




@stop