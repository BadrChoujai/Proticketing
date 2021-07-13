<?php
namespace App\Http\Controllers;

use App\Models\Status;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public $statusRepository;
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }
    public function index()
    {
        $liststatuses = $this->statusRepository->selectAll();
        return view('statuses.index', ['statuses' => $liststatuses]);
    }
/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function create()
    {
        return view('statuses.create');
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

        $this->statusRepository->store($request->all());

        return redirect('statuses');
    }
/**
 * Display the specified resource.
 *
 * @param  \App\Models\status  $status
 * @return \Illuminate\Http\Response
 */
/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Models\status  $priority
 * @return \Illuminate\Http\Response
 */
    public function edit($id)
    {
        $status = Status::find($id);
        return view('statuses.edit', ['status' => $status]);
    }
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\status  $priority
 * @return \Illuminate\Http\Response
 */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $this->statusRepository->update($id, $request->all());

        return redirect('statuses');
    }
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\status  $priority
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        $this->statusRepository->destroy($id);
        return redirect('statuses');
    }
}
