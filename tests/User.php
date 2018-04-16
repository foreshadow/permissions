<?php

// namespace App;

use Illuminate\Database\Eloquent\Model;
use Wbb\Permissions\Traits\HasRoleAndPermission;

class User extends Model
{
    use HasRoleAndPermission;
}
