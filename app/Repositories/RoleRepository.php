<?php

namespace App\Repositories;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleRepository
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function getRoles()
    {
        return $this->role->all();
    }

    public function getRoleById($id)
    {
        return $this->role->where('id', $id)->first();
    }

    public function createRole(Request $request)
    {
        return $this->role->create($request->all());
    }

    public function updateRoleById(Request $request, $id)
    {
        return $this->role->find($id)
            ->update(
                $request->all()
            );
    }

    public function deleteRoleById($id)
    {
        return $this->role->destroy($id);
    }
}
