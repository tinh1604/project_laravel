<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    public $table = 'admins';
    public $primaryKey = 'id';

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    //bỏ qua trường updated_at
    const UPDATED_AT = null;

    public static function getAdmin($username, $password) {
        $admin = Admin::where('username', '=', $username)
            ->where('password', '=', $password)
            ->first();

        return $admin;
    }
}
