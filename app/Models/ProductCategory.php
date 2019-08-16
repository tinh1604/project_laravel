<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public $table = 'product_category';
    public $primaryKey = 'id';
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;


    const UPDATE_AT = null;
    public function PaginationBackend() {
        $product_category = ProductCategory::paginate(10);
        return $product_category;
    }

}
