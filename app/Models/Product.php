<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model_extend;

class Product extends Model
{
    public $table = 'product';
    public $primaryKey = 'id';

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    //bỏ qua trường updated_at
    const UPDATED_AT = null;

//Backend
    public function getAllPaginationBackend()
    {
        //join sử dụng cơ chế Eloquent ORM
        $product = Product::with('product_category_Relation')
//        {$this->querySearch}
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return $product;
    }
//    public function related_products($id)
//    {
//        $related_products = Product::where('id' > $id, 'id' < $id+5 )
//            ->get();
//        return $related_products;
//    }


    public static function getByIdRelation($id) {
        $product = Product::with('product_category_Relation')
            ->find($id);

        return $product;
    }


//     Tạo relation 1 - 1 với bảng product_category

    public function product_category_Relation() {
        return $this->hasOne(ProductCategory::class, "id", "product_category_id");
    }


//Frontend

    public function get_highlight_product()
    {
        $product = Product::where('highlight',1)->get();
        return $product;

    }

    public function get_breakfast_food()
    {

        $product = Product::whereHas('product_category_Relation', function ($product_category) {
            $product_category->where('product_category.name', 'Điểm tâm sáng');
        })->paginate(12);
        return $product;
    }

    public function get_lunch_food()
    {
        $product = Product::whereHas('product_category_Relation', function ($product_category) {
            $product_category->where('product_category.name', 'Món chính');
        })->paginate(12);
        return $product;
    }
    public function get_drink()
    {
        $product = Product::whereHas('product_category_Relation', function ($product_category) {
            $product_category->where('product_category.name', 'rượu');
        })->paginate(12);
        return $product;
    }
    public function get_booze()
    {
        $product = Product::whereHas('product_category_Relation', function ($product_category) {
            $product_category->where('product_category.name', 'Thức uống');
        })->paginate(12);
        return $product;
    }

}
