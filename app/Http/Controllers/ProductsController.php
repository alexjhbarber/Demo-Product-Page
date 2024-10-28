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

        if ($request->has('min_price') && !empty($request->input('min_price'))) {
            $minPrice = (float)$request->input('min_price');
            $query->where('price', '>=', $minPrice);
        }

        if ($request->has('max_price') && !empty($request->input('max_price'))) {
            $maxPrice = (float)$request->input('max_price');
            $query->where('price', '<=', $maxPrice);
        }

        $products = $query->paginate(9);

        return response()->json($products);
    }

    public function filters(): \Illuminate\Http\JsonResponse
    {
        $brands = Product::distinct()->pluck('brand');
        $categories = Product::distinct()->pluck('category');

        return response()->json([
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }
}

