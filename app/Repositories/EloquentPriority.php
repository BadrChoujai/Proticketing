<?php
namespace App\Repositories;

use App\Models\Priority;

class EloquentPriority implements PriorityRepository
{
    public function selectAll()
    {
        return Priority::all();
    }
    public function find($id)
    {
        return Priority::find($id);
    }
    public function store($data)
    {
        return Priority::create(array(
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
        $priority = Priority::find($id);
        $priority->delete();
    }
}
