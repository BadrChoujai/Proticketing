<?php
namespace App\Repositories;

use App\Models\Categorie;

class EloquentCategorie implements CategorieRepository
{

    public function selectAll()
    {
        return Categorie::all();
    }
    public function find($id)
    {
        return Categorie::find($id);

    }
    public function store(array $data)
    {
        return Categorie::create(array(
            'name' => $data['name'],

        ));

    }
    public function update($id, array $data)
    {

        $this->find($id)->update(array(
            'name' => $data['name'],
        )
        );

    }
    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();

    }

}
