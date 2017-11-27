<?php

namespace Wbb\Permissions\Traits;

use DB;

trait HasRoleAndPermissionExtension {

    public function is($role)
    {
        return $this->hasRole($role);
    }

    public function canDo($permission)
    {
        return $this->hasPermission($permission);
    }

    public function attachOrCreatePermission($permission, $name = null)
    {
        $p = DB::table('permissions')->where(is_int($permission) ? 'id' : 'slug', $permission)->first();
        if (!$p) {
            DB::table('permissions')->insert(['name' => $name ?? $permission, 'slug' => $permission]);
            $p = DB::table('permissions')->where(is_int($permission) ? 'id' : 'slug', $permission)->first();
        }
        return $this->attachPermission($p->id);
    }
}
