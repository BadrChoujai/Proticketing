<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Repositories\PriorityRepository;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(PriorityRepository $priorityRepository)
    {
        $this->priorityRepository = $priorityRepository;
    }
    
    public function index()
    {
        $listpriorities = $this->priorityRepository->selectAll();
        return view('priorities.index', ['priorities' => $listpriorities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('priorities.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $priority = new Priority();
        $this->priorityRepository->store($request->all());
        $request->validate([
            'name' => 'required',
        ]);
        return redirect('priorities');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\priority  $priority
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $priority = Priority::find($id);
        return view ('priorities.edit' , ['priority' => $priority]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $priority = Priority::find($id);
        $this->priorityRepository->update($id, $request->all());
        return redirect ('priorities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->priorityRepository->destroy($id);
        return redirect ('priorities');
    }
}
