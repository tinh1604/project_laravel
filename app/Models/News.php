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
//        $news = News::with(['categoriesRelation' => function($category) {
//          $category->select(['id', 'name']);
//        }] )
//      ->orderBy('created_at', 'DESC')
//          ->get();

      //join sử dụng cơ chế Eloquent ORM
      $news = News::with('categoriesRelation')
        ->with('adminsRelation')
        ->orderBy('created_at', 'DESC')
        ->paginate(1);


        //join sử dụng query builder
//        $news = DB::table("news")
//          ->join("categories", "news.category_id", "=", "categories.id")
//          ->paginate(1);
        return $news;
    }


    public static function getByIdRelation($id) {
      $news = News::with('categoriesRelation')
        ->with('adminsRelation')
        ->find($id);

      return $news;
    }

  /**
   * Tạo relation 1 - 1 với bảng category
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
    public function categoriesRelation() {
      return $this->hasOne(Category::class, "id", "category_id");
    }

  /**
   * Tạo relation 1 - 1 với bảng admin
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function adminsRelation() {
    return $this->hasOne(Admin::class, "id", "admin_id");
  }
}
