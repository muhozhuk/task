@extends('layouts.main')
@section('title')
Create
@endsection
@section('content')
	<div class="col-md-10 offset-1">
		<h3>Create new user</h3>
		<div class="row">	
		    <form action="{{ url('/users') }}" method="post">
		        {!! csrf_field() !!}
		        <div class="form-row">
			        <label for="last_name">Фамилия:</label>
			        <input class="form-control" required type="text" name="last_name" id="last_name" value="{{old('last_name')}}">

			        <label for="first_name">Имя:</label>
			        <input class="form-control" required type="text" name="first_name" id="first_name" value="{{old('first_name')}}">

		        	<label for="middle_name">Отчество:</label>
		        	<input class="form-control" required type="text" name="middle_name" id="middle_name" value="{{old('middle_name')}}">

					<label for="birth_day">Дата рождения:</label>
					<input class="form-control" required type='date' name="birth_day" id="birth_day" min="1930-01-01" max="2000-01-01" value="{{old('birth_day')}}">

					<label for="inn">ИНН: </label>
					<input class="form-control" required type="text" name="inn" id="inn" value="{{old('inn')}}">

					<label for="snils">СНИЛС: </label>
					<input class="form-control" required type="text" name="snils" id="snils">	

			        <input class="form-control" type="hidden" name="organisation_id" value="{{ $organisation_id }}">
			        
			        <button class="btn btn-success container-fluid" type="submit">Submit</button>
		        </div>
		        
		    </form>
		</div>
    </div>
@endsection