<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;


class ProductController extends Controller
{
    public function detail($id)
    {
        $product = Product::find($id);

        return view('frontend.products.detail', [
            'product' => $product
        ]);
    }
    public function breakfast_food() {
        $productModel = new Product();
        $product = $productModel->get_breakfast_food();
        return view('frontend.products.product', [
            'product' => $product
        ]);
    }
    public function lunch_food() {
        $productModel = new Product();
        $product = $productModel->get_lunch_food();
        return view('frontend.products.product', [
            'product' => $product
        ]);
    }
    public function drink() {
        $productModel = new Product();
        $product = $productModel->get_drink();
        return view('frontend.products.product', [
            'product' => $product
        ]);
    }
    public function booze() {
        $productModel = new Product();
        $product = $productModel->get_booze();
        return view('frontend.products.product', [
            'product' => $product
        ]);
    }
}

