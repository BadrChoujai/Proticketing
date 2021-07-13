<?php
namespace App\Repositories;
interface CitieRepository
{
    public function selectAll();
    public function find($id);
    public function store(array $data);
    public function update($id, array $data);
    public function destroy($id);
}