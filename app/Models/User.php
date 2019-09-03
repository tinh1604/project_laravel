<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    public $table = 'users';
    public $primaryKey = 'id';

    //bỏ qua trường updated_at
    const UPDATED_AT = null;

    public static function getUser($email, $password) {
        $user = User::where('email', '=', $email)
            ->where('password', '=', $password)
            ->first();

        return $user;
    }
    public function getAll()
    {
        $user = User::
        orderBy('id', 'DESC')
            ->paginate(10);

        return $user;
    }



}
