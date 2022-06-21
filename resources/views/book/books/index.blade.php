@extends('templates.app')

{{-- CUERPO --}}
@section('section')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class=" text-center">Buscador de Libros</h1>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <select name="category_id" style="width: 100%" class="select2" id="category_id"
                                onchange="getByCategory(this.value);resetPagination()"></select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h2>Libros</h2>
                        </div>
                    </div>
                    <div id="books_panel" class="row">

                    </div>
                    <div id="button-more-books" class="d-none">
                        <button class="btn btn-sm btn-warning" onclick="loadMoreBooks()">Cargar más...</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('fina_scripts')
    <script>
        var page = 0;
        /**
         * 
         */
        function getByCategory(category_id, page = null) {
            var url = '{{ route('book.books.by_category', ['category_id' => 'category_id']) }}?';
            url = url.replace('category_id', category_id || 'all')
            if (page) {
                url = url + '&page='+ page;
            }
            $.easyAjax({
                url: url,
                type: "GET",
                success: function(response) {
                    console.log(response);
                    var html = '';
                    var data = response.data;
                    for (const book of data) {
                        html += templateBook(book);
                    }
                    if ( data.length >= '{{ config('app.api_http.max_items_per_page')}}') {
                        $('#button-more-books').removeClass('d-none')
                    }else{
                        $('#button-more-books').addClass('d-none')
                    }
                    $('#books_panel').append($(html));
                },
                error: function(error) {
                    showErrors(error);
                },
            });
        }

        
        function openBook(book_id) {
            if (!book_id) {
                return false;
            }
            var url = "{{ route('book.books.show', 'book_id')}}";
            url = url.replace('book_id', book_id)
            $.ajaxModal("#modal-component", url);
        }

        function loadMoreBooks() {
            page = page+1;
            getByCategory($('#category_id').val(), page);
        }
        function resetPagination() {
            page = 1;
            $('#books_panel').html('');
        }
        getCategories();
    </script>
@endsection
