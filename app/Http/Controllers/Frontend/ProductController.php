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
        $productModel = new Product();
//        $related_products = $productModel->related_products($id);
        return view('frontend.products.detail', [
            'product' => $product,
//            'related_products' => $related_products
        ]);
    }
    public function breakfast_food() {
        $productModel = new Product();
        $product = $productModel->get_breakfast_food();
        return view('frontend.products.product', [
            'product' => $product,
            'ProductCategory' => 'Điểm tâm sáng'
        ]);
    }
    public function lunch_food() {
        $productModel = new Product();
        $product = $productModel->get_lunch_food();
        return view('frontend.products.product', [
            'product' => $product,
            'ProductCategory' => 'Món chính'
        ]);
    }
    public function drink() {
        $productModel = new Product();
        $product = $productModel->get_drink();
        return view('frontend.products.product', [
            'product' => $product,
            'ProductCategory' => 'Thức uống'

        ]);
    }
    public function booze() {
        $productModel = new Product();
        $product = $productModel->get_booze();
        return view('frontend.products.product', [
            'product' => $product,
            'ProductCategory' => 'Rượu'
        ]);
    }
}

