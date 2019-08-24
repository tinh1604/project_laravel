<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    public $table = 'admins';
    public $primaryKey = 'id';

    //bỏ qua trường updated_at
    const UPDATED_AT = null;

    public static function getAdmin($username, $password) {
        $admin = Admin::where('username', '=', $username)
            ->where('password', '=', $password)
            ->first();

        return $admin;
    }
    public function getAllPaginationBackend()
    {
        //join sử dụng cơ chế Eloquent ORM
        $admins = Admin::with('role_Relation')
            ->orderBy('id', 'DESC')
            ->paginate(5);

        return $admins;
    }


    public static function getByIdRelation($id) {
        $news = Admin::with('role_Relation')
            ->find($id);

        return $news;
    }


    public function role_Relation() {
        return $this->hasOne(Role::class, "id", "role_id");
    }
}
