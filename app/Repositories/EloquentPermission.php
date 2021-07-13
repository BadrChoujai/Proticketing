<?php
namespace App\Repositories;

use App\Models\Permission;

class EloquentPermission implements PermissionRepository
{
    public function selectAll()
    {
        return Permission::all();
    }
    public function find($id)
    {
        return Permission::find($id);
    }
    public function store($data)
    {
        return Permission::create(array(
            'name' => $data['name']
        ));
    }
    public function update($id ,array $data)
    {
        $this->find($id)->update(array('name' => $data['name'
        ]));
    }
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
    }
}
