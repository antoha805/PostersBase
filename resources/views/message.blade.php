<div class="">
    @if ($OKs)
        <div style="color: green">
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