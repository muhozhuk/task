@extends('layouts.main')
@section('title')
Organization
@endsection
@section('content')
    <div class="col-md-10 offset-1">
        <h1>{{$name}}</h1>
        <table class="table">
            <thead>
                <tr>
                    <td>ОГРН</td>
                    <td>ОКТМО</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$ogrn}}</td>
                    <td>{{$oktmo}}</td>
                </tr>
            </tbody>
        </table>
        @if($users)
            <h4>Пользователи организации "{{$name}}"</h4>
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Фамилия</td>
                        <td>Имя</td>
                        <td>Отчество</td>
                        <td>Дата рождения</td>
                        <td>ИНН</td>
                        <td>СНИЛС</td>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user['id']}}</td>
                            <td>{{$user['last_name']}}</td>
                            <td>{{$user['first_name']}}</td>
                            <td>{{$user['middle_name']}}</td>
                            <td>{{$user['birth_day']}}</td>
                            <td>{{$user['inn']}}</td>
                            <td>{{$user['snils']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>       
        @endif
        <a href="{{ route('users.create', ['organisation_id' => $id])}}" class="btn btn-success container-fluid">Add user</a>
    </div>
@endsection