@extends('layouts.main')
@section('title')
Edit
@endsection
@section('content')
	<div class="col-md-10 offset-1">
		<h3>Edit organization "{{$organisation['name']}}"</h3>
	    <form action="/organisations/{{$organisation['id']}}" method="post" class="form">
	    	
	        {!! csrf_field() !!}
	        <input type="text" hidden name="_method" value="PUT">

	        <div class="form-row">
	        	<label for="name">Имя:</label>
		        <input class="form-control" required type="text" name="name" id="name" value="{{$organisation['name']}}">

		        <label for="ogrn">ОГРН:</label>
		        <input class="form-control" required type="text" name="ogrn" id="ogrn" value="{{$organisation['ogrn']}}">

		        <label for="oktmo">ОКТМО:</label>
		        <input class="form-control" required type="text" name="oktmo" id="oktmo" value="{{$organisation['oktmo']}}">
				<button type="submit" class="btn btn-primary container-fluid">Edit</button>		
		    </div>


	    </form>
	</div>
@endsection