<?php
namespace App\Http\Controllers;

use App\Models\Citie;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userRepository;
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $listcustomer = $this->userRepository->selectAll();
        return view('user.index', ['users' => $listcustomer]);
    }
/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function create()
    {
        $roles = Role::all();
        $cities = Citie::all();
        return view('user.create', [
            'roles' => $roles,
            'cities' => $cities,
        ]);
        return view('user.create');
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
            'email' => 'required',
            'password' => 'required',
        ]);

        $this->userRepository->store($request->all());

        return redirect('users');
    }
/**
 * Display the specified resource.
 *
 * @param  \App\Models\User  $user
 * @return \Illuminate\Http\Response
 */
/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Models\User $user
 * @return \Illuminate\Http\Response
 */
    public function edit($id)
    {
        $roles = Role::all();
        $cities = Citie::all();
        $user = User::find($id);
        return view('user.edit', ['user' => $user, 'roles' => $roles, 'cities' => $cities]);
    }
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\User $user
 * @return \Illuminate\Http\Response
 */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $this->userRepository->update($id, $request->all());

        return redirect('users');
    }
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\User  $user
 * @return \Illuminate\Http\Response
 */
    public function destroy( $id)
    {
        $this->userRepository->destroy($id);
        return redirect('users');
    }
}