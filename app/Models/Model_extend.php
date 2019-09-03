<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Model_extend extends Model
{
    public function __construct()
    {
        $this->querySearch = $this->getQuerySearch();
    }

    public function getQuerySearch(Request $request)
    {
        $querySearch = ' WHERE TRUE';

        //search sản phẩm
        if ($request->name && !empty($request->name)) {
            $querySearch .= " AND product.name LIKE '%{$request->name}%'";
        }
        if ($request->price && !empty($request->price)) {
            $querySearch .= " AND product.price = {$request->price}";
        }
        if ($request->product_category_id && $request->product_category_id != 0) {
            $querySearch .= " AND product.product_category_id = {$request->product_category_id}";
        }

        return $querySearch;
    }


}
