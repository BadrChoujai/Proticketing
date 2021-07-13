<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TicketController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         if (hasRole('admin')) {
        return view('home');
    }
    return redirect('tickets');
    }
}
