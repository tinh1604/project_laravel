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


    public function getAllPaginationBackend()
    {
        //join sử dụng cơ chế Eloquent ORM
        $product = Product::with('product_category_Relation')
            ->orderBy('id', 'ASC')
            ->paginate(10);

        return $product;
    }


    public static function getByIdRelation($id) {
        $news = Product::with('product_category_Relation')
            ->find($id);

        return $news;
    }

    /**
     * Tạo relation 1 - 1 với bảng product_category
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product_category_Relation() {
        return $this->hasOne(ProductCategory::class, "id", "product_category_id");
    }
}
