<div class="row">
    
    <div class="col-sm-12 text-center" >
        <h2>{{$book->title}}</h2>

        <img src="{{ $book->cover}}" style="50em" alt="">
    </div>
    <div class="col-sm-12">
        <hr>
        <h3>Detalles del libro</h3>
        <table class="table">
            <tr>
                <td><strong>Autor</strong></td>
                <td>{{ $book->author}}</td>
            </tr>
            <tr>
                <td><strong>Año</strong></td>
                <td>{{ $book->publisher_date}}</td>
            </tr>
            <tr>
                <td><strong>Páginas</strong></td>
                <td>{{ $book->pages}}</td>
            </tr>
            <tr>
                <td><strong>Idioma</strong></td>
                <td>{{ $book->language}}</td>
            </tr>
            <tr>
                <td><strong>Autor</strong></td>
                <td>{{ $book->author}}</td>
            </tr>
            <tr>
                <td><strong>Autor</strong></td>
                <td>{{ $book->author}}</td>
            </tr>
            <tr>
                <td><strong>Autor</strong></td>
                <td>{{ $book->author}}</td>
            </tr>
        </table>

        <p><strong>Contenido:</strong></p>
        <p>{!! $book->content_short !!}</p>
        <hr>
        @if (isset($book->categories) && is_array($book->categories) && count($book->categories)> 0)
            <p class="pb-0"><strong>Categorías</strong></p>
            <p>
                @foreach ($book->categories as $key =>$category)
                    <span>{{ $category->name}}@if($key != count($book->categories)-1),@endif</span>
                @endforeach
            </p>
        @endif

        @if (isset($book->tags) && is_array($book->tags) && count($book->tags)> 0)
            <p class="pb-0"><strong>Tags</strong></p>
            <p>
                @foreach ($book->tags as $key =>$tag)
                    <span>{{ $tag->name}}@if($key != count($book->tags)-1),@endif</span>
                @endforeach
            </p>
        @endif
    </div>
</div>
