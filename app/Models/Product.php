<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return $product;
    }


    public static function getByIdRelation($id) {
        $product = Product::with('product_category_Relation')
            ->find($id);

        return $product;
    }

    /**
     * Tạo relation 1 - 1 với bảng product_category
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
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
        $product = Product::where('product_category_id',1)->get();
        return $product;
    }

    public function get_lunch_food()
    {
        $product = Product::where('product_category_id',2)->get();
        return $product;
    }
    public function get_drink()
    {
        $product = Product::where('product_category_id',3)->get();
        return $product;
    }
    public function get_booze()
    {
        $product = Product::where('product_category_id',4)->get();
        return $product;
    }



}
