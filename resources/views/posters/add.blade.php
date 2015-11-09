@extends('layout')

@section('title')
    Adding poster
@stop


@section('script')
    <script>
        $(document).ready(function() {
            $('#form').on('submit', function(e){
                e.preventDefault();
                var $that = $(this),
                        formData = new FormData($that.get(0));
                $.ajax({
                    url: "#",
                    processData: false,
                    contentType: false,
                    data: formData,
                    type: "POST",
                    success: function(response) { $('#message').html(response) },
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
            <div id="message"></div>
            <h2>Adding poster</h2>
            {{ Form::open(array('class' => 'form-horizontal', 'id' => 'form', 'enctype' => 'multipart/form-data')) }}
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-5">
                    {{ Form::text('name', null, array('id' => 'poster_name', 'class' => 'form-control bbeditor')) }}<br />
                </div>
            </div>
            <div class="form-group">
                <label for="body" class="col-sm-2 control-label">Body</label>
                <div class="col-sm-5">
                    {{ Form::textarea('body', null, array('id' => 'poster_body', 'class' => 'form-control bbeditor')) }}<br />
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-5">
                    {{ Form::file('image', array('id' => 'poster_image', 'accept' => 'image/*')) }}<br />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">&nbsp;</div>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary submit-button" id="add_button">Add</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop