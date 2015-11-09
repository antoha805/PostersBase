<div class="">
    @if ($OKs)
        <script type="text/javascript">
            setTimeout(function(){$('#messages').fadeOut('slow')}, 3000);
        </script>
        <div id="messages" style="color: green">
            @foreach($OKs as $ok)
                <p>{{ $ok }}</p>
            @endforeach
        </div>
    @endif
    @if ($errors)
        <div style="color: red">
            @foreach($errors as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
</div>