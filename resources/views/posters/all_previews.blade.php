<div class="container">
    <?php
    $posters = array_chunk(iterator_to_array($posters), 3);
    ?>
    @foreach($posters as $postersChunk)
        <div class="row">
            @foreach($postersChunk as $poster)
                @include('posters/poster_preview')
            @endforeach
        </div>
    @endforeach
</div>