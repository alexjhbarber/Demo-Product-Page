<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    //
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $query = Product::query();

        $products = $query->paginate(9);

        return response()->json($products);
    }
}
