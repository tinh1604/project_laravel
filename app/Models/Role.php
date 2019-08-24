<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $table = 'roles';
    public $primaryKey = 'id';


    const UPDATED_AT = null;
    public function getAllPaginationBackend() {
        $roles = Role::paginate(5);
        return $roles;
    }
}
