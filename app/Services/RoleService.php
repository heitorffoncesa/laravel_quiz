<?php


namespace App\Services;


use App\Models\Role;

class RoleService
{
    public function getRoles()
    {
        return Role::all();
    }

    public function getRoleBySlug(string $slug = null)
    {
        if (is_null($slug)) return [];
        return Role::findBySlug($slug);
    }
}
