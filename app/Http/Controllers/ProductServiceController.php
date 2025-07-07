<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Http\Responses\ApiResponse;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductServiceController extends Controller
{
    public function fetchProducts(Request $request): JsonResponse
    {
        if ($request->query('paginate') === 'false') {
            $products = Product::all();

            return ApiResponse::success([
                'products' => ProductResource::collection($products),
                'pagination' => null, // or just omit this key if not needed
            ], "Products fetched successfully.", Response::HTTP_OK);
        }

        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);

        $products = Product::paginate($perPage, ['*'], 'page', $page);

        return ApiResponse::success([
            'products' => ProductResource::collection($products),
            'pagination' => [
                'total' => $products->total(),
                'per_page' => $products->perPage(),
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
            ]
        ], "Products fetched successfully.", Response::HTTP_OK);
    }
}
