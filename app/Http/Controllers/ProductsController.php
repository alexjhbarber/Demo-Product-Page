<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $query = Product::query();

        if ($request->has('category') && !empty($request->input('category'))) {
            $categories = explode(',', $request->input('category'));
            $query->whereIn('category', $categories);
        }

        if ($request->has('brand') && !empty($request->input('brand'))) {
            $brands = explode(',', $request->input('brand'));
            $query->whereIn('brand', $brands);
        }

        $products = $query->paginate(9);

        return response()->json($products);
    }
}

