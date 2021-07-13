<?php
namespace App\Repositories;

use App\Models\Status;

class EloquentStatus implements StatusRepository
{

    public function selectAll()
    {
        return Status::all();
    }
    public function find($id)
    {
        return Status::find($id);

    }
    public function store(array $data)
    {
        return Status::create(array(
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
        $status = Status::find($id);
        $status->delete();

    }

}
