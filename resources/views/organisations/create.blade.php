@extends('layouts.main')
@section('title')
Create
@endsection
@section('content')

	<div class="col-md-10 offset-1">
		<h3>Create new organization</h3>
		<div class="row">			
		    <form action="{{ url('/organisations') }}" method="post">
		        {!! csrf_field() !!}
		        <div class="form-row">
		        	<label for="name">Имя:</label>
			        <input class="form-control" required type="text" name="name" id="name" value="{{old('name')}}">

			        <label for="ogrn">ОГРН:</label>
			        <input class="form-control" required type="text" name="ogrn" id="ogrn" value="{{old('ogrn')}}">

			        <label for="oktmo">ОКТМО:</label>
			        <input class="form-control" required type="text" name="oktmo" id="oktmo">
			        <button class="btn btn-success container-fluid" type="submit">Submit</button>
			    </div>
		        {{-- <button class="btn btn-success container-fluid" type="submit">Submit</button> --}}
		    </form>
		</div>
    </div>
@endsection