<?php

namespace Wbb\Permissions\Traits;

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
        if (!DB::table('permissions')->where(is_int($permission) ? 'id' : 'slug', $permission)->first()) {
            DB::table('permissions')->insert(['name' => $name ?? $permission, 'slug' => $permission]);
        }
        return $this->attachPermission($permission);
    }
}
