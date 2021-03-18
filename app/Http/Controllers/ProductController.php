<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    protected ProductService $productService;

    /**
     * @var ProductService
     */
    public function __construct(
        ProductService $productService
    )
    {
        $this->productService = $productService;
    }

    /**
     * Search for products.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request): View
    {
        $search = $request->input('search');
        $products = $this->productService->search($search);

        return view('search', compact('products'));
    }
}
