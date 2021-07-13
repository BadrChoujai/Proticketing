<?php

namespace App\Repositories;

interface UserRepository
{
    public function selectAll();
    public function find($id);
    public function store(array $data);
    public function update($id, array $data);
    public function destroy($id);
}
