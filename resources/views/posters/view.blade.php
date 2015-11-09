@extends('layout')

@section('title')
    Poster {{ $poster->id }}
@stop

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h2>
                Poster {{ $poster->name }}
            </h2>
        </div>
    </div>

    <div class="container">
        <table class="table table-striped">
            <tr>
                <td>Image:</td>
                <td><img src="{{ asset ($poster->image) }}"></td>
            </tr>
            <tr>
                <td>Body:</td>
                <td>{{ $poster->body }}</td>
            </tr>
            <tr>
                <td>Author ip:</td>
                <td>{{ $poster->author_ip }}</td>
            </tr>
            <tr>
                <td>Author browser:</td>
                <td>{{ $poster->author_browser }}</td>
            </tr>
            <tr>
                <td>Author country:</td>
                <td>{{ $poster->author_country }}</td>
            </tr>
        </table>
    </div>
@stop
