@if(Session::has('gallery_name_message'))
	
	<div class="alert alert-success flash">
		{{ Session::get('gallery_name_message') }}
	</div>

@endif


@if(Session::has('gallery_name_delete'))
	
	<div class="alert alert-danger flash">
		{{ Session::get('gallery_name_delete') }}
	</div>

@endif

@if(Session::has('gallery_name_edit'))
	
	<div class="alert alert-success flash">
		{{ Session::get('gallery_name_edit') }}
	</div>

@endif

@if(Session::has('gallery_photo'))
	
	<div class="alert alert-success flash">
		{{ Session::get('gallery_photo') }}
	</div>

@endif