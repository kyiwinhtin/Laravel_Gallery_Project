<!DOCTYPE html>
<html>
<head>
	<title>My Gallery App</title>
	 <!-- Material Design fonts -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	 <!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	  <!-- Bootstrap Material Design -->
	<link rel="stylesheet" type="text/css" href="{{ url('dist/css/bootstrap-material-design.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('dist/css/ripples.min.css') }}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
	<link rel="stylesheet" type="text/css" href="{{ url('lightbox/dist/css/lightbox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('style.css') }}">

</head>
<body>


	@include('gallery.header')

	<div class="container">
		@yield('content')
	</div>

    <div class="container-fluid">
        @yield('fluid')
    </div>


	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script src="{{ url('lightbox/dist/js/lightbox.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(".flash").fadeToggle(4000);
        });
    </script>
</body>
</html>