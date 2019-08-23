<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';
    public $primaryKey = 'id';

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    //bỏ qua trường updated_at
    const UPDATED_AT = null;

    public function getAllPaginationBackend()
    {
        $categories = Category::paginate(1);

        return $categories;
    }

}
