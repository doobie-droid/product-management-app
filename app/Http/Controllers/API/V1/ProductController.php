<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @group Product
 * 
 * Product Related Apis
 */
class ProductController extends Controller
{
    /**
     * List all products
     * 
     * This endpoint returns a paginated list of all products
     * 
     * @apiResourceCollection App\Http\Resources\ProductResource
     * @apiResourceModel App\Models\Product paginate=10
     */
    public function index()
    {
        return ProductResource::collection(Product::paginate(10));
    }

    /**
     * Create New Product
     * 
     * This endpoint creates a new product
     *
     * @apiResource App\Http\Resources\ProductResource
     * @apiResourceModel App\Models\Product
     */
    public function store(StoreProductRequest $request)
    {
        $newProduct = Product::create($request->validated());
        return new ProductResource($newProduct);
    }

    /**
     * Display Single Product
     * 
     * This endpoint displays a specific product
     *
     * @apiResource App\Http\Resources\ProductResource
     * @apiResourceModel App\Models\Product
     * @response 404 {"message": "App\Models\Product not found"}
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }
}
