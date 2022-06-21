<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Services\ApiHttpService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private ApiHttpService $apiHttpService;
    /**
     * Inyección de dependencias
     * @param ApiHttpService $apiHttpService
     */
    public function __construct(
        ApiHttpService $apiHttpService
    ) {
        $this->apiHttpService = $apiHttpService;
    }
    /**
     * @param Request $request
     */
    public function index()
    {
        $data = $this->apiHttpService->get( 
            config('app.api_http.routes.categories')
        );
        if ($data == null ) {
            return response()->json([
                'message'   => 'Categorías no encontradas'
            ], 404);
        }
        return response()->json([
            'data'  => $data
        ]);
    }

}
