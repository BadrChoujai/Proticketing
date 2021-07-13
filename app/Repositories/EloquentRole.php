<?php
namespace App\Repositories;

use App\Models\Role;

class EloquentRole implements RoleRepository
{
    public function selectAll()
    {
        return Role::all();

    }
    public function find($id)
    {
        return Role::find($id);

    }
    public function store(array $data)
    {
        return Role::create(array(
            'name' => $data['name'],
        ));
    }
    public function update($id, array $data)
    {
        $role = $this->find($id);

        $role->update(array(
            'permission_id' => $data['permission_id'],
            'name' => $data['name'])
        );

        return $role;

    }
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

    }

}
