<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Product;


class HomeController extends Controller
{
    public function index() {
        $productModel = new Product();
        $product = $productModel->get_highlight_product();

        return view('frontend.homes.index', [
            'product' => $product
        ]);
    }
}
