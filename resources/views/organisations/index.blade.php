@extends('layouts.main')
@section('title')
Organizations
@endsection
@section('content')      
    <div class="col-md-10 offset-1">
        <div class="row">
            <form action="/import" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <input type="file" name="import">
            <button type="submit" class="btn btn-primary">Import XML</button>
            </form>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Имя</td>
                    <td>ОГРН</td>
                    <td>ОКТМО</td>
                    <td>Actions</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                    @foreach($organisations as $item)
                        <tr>
                            <td>{{$item['id']}}</td>
                            <td><a href="/organisations/{{$item['id']}}">{{$item['name']}}</a></td>
                            <td>{{$item['ogrn']}}</td>
                            <td>{{$item['oktmo']}}</td>
                            <td>
                                <form action="/organisations/{{$item['id']}}" method="post">
                                    {!! csrf_field() !!}
                                    <input type="text" hidden name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                                </form>
                            </td>
                            <td>
                                <a href="/organisations/{{$item['id']}}/edit" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('organisations.create') }}" class="container-fluid btn btn-success">Create</a>
    </div>
@endsection
