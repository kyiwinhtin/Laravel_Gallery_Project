@extends('master')

@section('content')



	<div class="row">
		<div class="col-md-12">
			<h1>My Gallery App</h1>
		</div>
	</div>


	<div class="row">
		<div class="col-md-6">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Name of the gallery</th>
						<th>Action</th>
						<th>Post By</th>
					</tr>
				</thead>
				<tbody>
					@foreach($galleries as $gallery)
					<tr>
						<td>
							{{ $gallery->gallery_name }}
							<span class="pull-right">
								{{ $gallery->images->count() }}
							</span> 
						</td>
						<td>
							
							<a href="{{ action('GalleryController@viewGallery',$gallery->id) }}">View</a>
							@if(Auth::user()->id == $gallery->created_by)
							/<a href="{{ action('GalleryController@deleteGallery',$gallery->id) }}">Delete</a>
							@endif

						</td>
						<td>{{ $gallery->post_by }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-6">

			@include('errors.list')
			@include('flash.message')


			<form action="{{ action('GalleryController@saveGalleryName') }}" method="POST">
				{{ csrf_field()}}
				<div class="form-group">
					<label>Gallery Name</label>
					<input type="hidden" name="post_by" value="{{ Auth::user()->name }}">
					<input type="text" name="gallery_name" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Save Gallery</button>
			</form>
		</div>
	</div>



@stop