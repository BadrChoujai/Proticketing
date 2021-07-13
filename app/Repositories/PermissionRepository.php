<?php
namespace App\Repositories;
interface PermissionRepository
{
    public function selectAll();
    public function find($id);
    public function store(array $data);
    public function update($id, array $data);
    public function destroy($id);
}