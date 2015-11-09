@extends('layout')

@section('title')
    Posters base
@stop

@section('script')
    <script>
        $(document).ready(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $('#first_new_btn').click(function(){
                $.ajax({
                    url: "{{ route("sort", ["direction" => "desc"])  }}",
                    type: "POST",
                    data: {_token: CSRF_TOKEN},
                    success: function(response) {
                        $('#first_new_btn').attr('disabled','disable');
                        $('#first_old_btn').removeAttr('disabled');
                        $('#posters').html(response) },
                    error: function( jqXHR, textStatus, errorThrown ){
                        alert('error: ' + textStatus );
                    }
                });
            });
            $('#first_old_btn').click(function(){
                $.ajax({
                    url: "{{ route("sort", ["direction" => "asc"])  }}",
                    type: "POST",
                    data: {_token: CSRF_TOKEN},
                    success: function(response) {
                        $('#first_old_btn').attr('disabled','disable');
                        $('#first_new_btn').removeAttr('disabled');
                        $('#posters').html(response) },
                    error: function( jqXHR, textStatus, errorThrown ){
                        alert('error: ' + textStatus );
                    }
                });
            });
        });
    </script>
@stop

@section('content')

    <div class="jumbotron">
        <div class="container">
            <h1>Posters base</h1>
        </div>
    </div>

    <div class="container">
        <button type="button" class="btn btn-primary submit-button" id="first_new_btn" disabled>First new</button>
        <button type="button" class="btn btn-primary submit-button" id="first_old_btn">First old</button>
    </div>

    <div id="posters">
        @include('posters/all_previews')
    </div>

@stop