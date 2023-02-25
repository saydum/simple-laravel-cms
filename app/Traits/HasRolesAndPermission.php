<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasRolesAndPermission
{
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }

    /**
     * @param mixed ...$roles
     * @return bool
     */
    public function hasRole(... $roles): bool
    {
        foreach ($roles as $role) {
            if ($this->roles->containse('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param Permission $permission
     * @return bool
     */
    public function hasPermission(Permission $permission): bool
    {
        return (bool) $this->permissions()->where('slug', $permission)->count();
    }

    /**
     * @param Permission $permission
     * @return bool
     */
    public function hasPermissionTo(Permission $permission): bool
    {
        return $this->permissions($permission) || $this->hasPermission($permission->slug);
    }

    /**
     * @param Permission $permission
     * @return bool
     */
    public function hasPermissionThroughRole(Permission $permission): bool
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param array $permissions
     * @return mixed
     */
    public function getAllPermissions(array $permissions): mixed
    {
        return Permission::whereIn('slug', $permissions)->get();
    }

    /**
     * @param mixed ...$permissions
     * @return $this
     */

    public function givePermissionsTo(array ...$permissions): static
    {
        $permissions = $this->getAllPermissions($permissions);
        if ($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    /**
     * @param mixed ...$permissions
     * @return $this
     */
    public function deletePermissions(array ...$permissions): static
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    /**
     * @param mixed ...$permissions
     * @return HasRolesAndPermission
     */
    public function refreshPermission(array ...$permissions): HasRolesAndPermission
    {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }
}
