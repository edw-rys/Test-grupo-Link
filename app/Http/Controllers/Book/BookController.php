<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Services\ApiHttpService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * 
     */
    private ApiHttpService $apiHttpService;
    private $views ;
    private $maxPage = 10 ;
    /**
     * Inyección de dependencias
     * @param ApiHttpService $apiHttpService
     */
    public function __construct(
        ApiHttpService $apiHttpService

    ) {
        $this->views = (object)[
            'index'  => 'book.books.index',
            'show'  => 'book.books.show'
        ];
        $this->apiHttpService = $apiHttpService;
    }
    /**
     * 
     */
    public function index(Request $request)
    {
        return view($this->views->index);
    }
    /**
     * @param Request $request
     * @param $category_id
     */
    public function getBooksByCategory(Request $request, $category_id)
    {
        if ($category_id == 'all') {
            return response()->json([
                'data'  => []
            ]);
        }

        $paginate = '0,10';
        if ($request->page && is_int(+$request->page)) {
            $end = $this->maxPage * $request->page;
            $paginate = ($end - 9).','.$end;
        }
        $route = config('app.api_http.routes.book_by_ctg').$category_id.'&results_range='.$paginate;
        $data = $this->apiHttpService->get( 
            $route
        );
        if ($data == null ) {
            return response()->json([
                'message'   => 'Libros no encontrados'
            ], 404);
        }
        return response()->json([
            'data'  => $data,
        ]);
    }
    /**
     * Mostar el contenido de un libro
     * @param $id
     */
    public function show($id)
    {
        if (!$id) {
            abort(404);
        }
        
        $data = $this->apiHttpService->get( 
            config('app.api_http.routes.book_by_id').$id
        );

        if ($data == null) {
            abort(404);
        }
        if (!isset($data[0])) {
            abort(404);
        }
        // dd((object) $data[0]);
        return view($this->views->show)
            ->with('book', (object) $data[0]);
    }
}
