<?php
namespace App\Repositories;

use App\Models\Citie;

class EloquentCitie implements CitieRepository
{
    public function selectAll()
    {
        return Citie::all();
    }
    public function find($id)
    {
        return Citie::find($id);
    }
    public function store($data)
    {
        return Citie::create(array(
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
        $citie = Citie::find($id);
        $citie->delete();
    }
}
