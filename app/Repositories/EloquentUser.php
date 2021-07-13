<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EloquentUser implements UserRepository
{
    public function selectAll()
    {
        return User::all();
    }
    public function find($id)
    {
        return User::find($id);
    }
    public function store($data)
    {
        return User::create(array(
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role_id'],
            'citie_id' => $data['citie_id'],
        ));
    }
    public function update($id, array $data)
    {
        $this->find($id)->update(array(
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role_id'],
            'citie_id' => $data['citie_id'],
        )
        );
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
