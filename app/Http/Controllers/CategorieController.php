<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Repositories\CategorieRepository;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public $categorieRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CategorieRepository $categorieRepository)
    {

        $this->categorieRepository = $categorieRepository;
    }
    public function index()
    {
        $listcategorie = $this->categorieRepository->selectAll();
        return view('categorie.index', ['categories' => $listcategorie]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorie.create');

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

        $this->categorieRepository->store($request->all());

        return redirect('categories');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    // public function show(Permission $permission)
    // {

    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categorie = Categorie::find($id);
        return view('categorie.edit', ['categorie' => $categorie]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $this->categorieRepository->update($id, $request->all());

        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categorieRepository->destroy($id);

        return redirect('categories');

    }
}
