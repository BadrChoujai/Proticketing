<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public $roleRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    public function index()
    {
        $listrole = $this->roleRepository->selectAll();
        $permissions = Permission::all();
        return view('roles.index', ['roles' => $listrole, 'permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $permissions = Permission::all();

        return view('roles.create', [
            'permissions' => $permissions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = $this->roleRepository->store($request->all());
        $role->permissions()->sync($request->permission_id);

        return redirect('roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    // public function show(Permission $permission)
    // {

    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $permissions = Permission::all();
        $role = Role::all();
        $role = Role::find($id);

        return view('roles.edit', ['role' => $role, 'permissions' => $permissions]);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $role = $this->roleRepository->update($id, $request->all());
        $role->permissions()->sync($request->permission_id);

        return redirect('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $this->roleRepository->destroy($id);

        return redirect('roles');

    }
}
