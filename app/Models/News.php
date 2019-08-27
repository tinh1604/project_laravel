<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    public $table = 'news';
    public $primaryKey = 'id';

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    //bỏ qua trường updated_at
    const UPDATED_AT = null;

    /**
     * Lấy danh sách tin tức đang có trên hệ thống, sử dung cơ chế phân trang Laravel,
     * Do cần lấy cả thông tin category, nên sẽ sử dụng cơ chế join của eloquent
     *
     * @return mixed
     */
    public function getAllPaginationBackend()
    {

        //join sử dụng cơ chế Eloquent ORM
        $news = News::with('categoriesRelation')
            ->orderBy('created_at', 'DESC')
            ->paginate(5);

        return $news;
    }


    public static function getByIdRelation($id)
    {
        $news = News::with('categoriesRelation')
            ->find($id);

        return $news;
    }


    public function categoriesRelation()
    {
        return $this->hasOne(Category::class, "id", "category_id");
    }


    public function introduction()
    {
        $news = News::where('category_id', 7)->get();
        return $news;
    }



    public function service()
    {
        $news = News::where('category_id', 8)->get();
        return $news;
    }
//    public function service()
//    {
//        $news = News::with(['categoriesRelation' => function ($category) {
//            $category->where('categories.name', 'Dịch vụ');
//        }])->get();
//        return $news;
//    }
}
