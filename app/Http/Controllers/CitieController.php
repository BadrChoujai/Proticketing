<?php

namespace App\Http\Controllers;

use App\Models\Citie;
use App\Repositories\CitieRepository;
use Illuminate\Http\Request;

class CitieController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function __construct(CitieRepository $citieRepository)
   {
      $this->citieRepository = $citieRepository;
   }

   public function index()
   {
      $cities = $this->citieRepository->selectAll();
      
      return view('citie.index', ['cities' => $cities]);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
   {
      return view('citie.create');
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
      
      $this->citieRepository->store($request->all());
      
      return redirect('cities');
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citie  $citie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
   {
      $citie = Citie::find($id);

      return view('citie.edit', ['citie' =>$citie]);
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citie  $citie
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
   {
      $this->citieRepository->update($id, $request->all());

      return redirect('cities');
   }

   /**
    * Remove the specified resource from storage.
   *
   * @param  \App\Models\Citie  $citie
   * @return \Illuminate\Http\Response
   */
   public function destroy($id)
   {
      $this->citieRepository->destroy($id);

      return redirect('cities');
   }
}
