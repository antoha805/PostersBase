<div class="col-md-4">
    <h3>{{ $poster->name }}</h3>
    <img src="{{ $poster->image_sml }}">
    <p>
        {{ date_create($poster->created_at)->format('d.m.Y H:i:s') }}<br />
    </p>
    <p><a class="btn btn-default" href="{{ route('poster', ['id' => $poster->id]) }}" role="button">Details &raquo;</a></p>
</div>
