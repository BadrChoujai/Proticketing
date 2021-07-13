<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function index(){
        $user = Auth()->user();
        return view('user.profile', ['user' => $user]);
    }
    public function update(Request $request)
    {
        $user =Auth()->user();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if($request->avatar != '') {   
            $path = public_path().'/assets/img/';
            //upload new file
            $avatar = $request->avatar;
            $filename = $avatar->getClientOriginalName();
            $avatar->move($path, $filename);
            //for update in table
            $user->update([
                'avatar' => $filename
            ]);
        }
        $user->update([
            'name' => $request->input('name'), 
            'password' => Hash::make($request->input('password')),
            'email' => $request->input('email'),
        ]);
    return $this->index();
}}