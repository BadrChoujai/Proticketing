<?php

namespace App\Http\Controllers\API;

use App\Models\Role;
use App\Models\User;
use App\Models\Citie;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\Priority;
use App\Models\Categorie;
use App\Mailers\AppMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TicketRepository;

class TicketController extends Controller
{
    public $ticketRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(TicketRepository $ticketRepository)
    {
        $this->middleware('auth');
        $this->ticketRepository = $ticketRepository;
    }
    public function index()
    {
        
        $listtickets = $this->ticketRepository->selectAll();
        $cities = Citie::query();
        $users = User::query();
        return response()->json( [  'tickets' => $listtickets, 'cities' => $cities, 'users' => $users

        ]);
    }
    
    public function create()
    {
        $categories = Categorie::query();
        $priorities = Priority::query();
        $users = User::query();
        $statuses = Status::query();
        $cities = Citie::query();

        if (hasRole('admin')) {
            $categories = $categories->get();
            $priorities = $priorities->get();
            $users = $users->get();
            $statuses = $statuses->get();
            $cities = $cities->get();

        }

        if (hasRole('it')) {
            $categories = $categories->get();
            $priorities = $priorities->get();
            $statuses = $statuses->get();

        }
        if (hasRole('agent')) {
            $categories = $categories->get();
            $priorities = $priorities->get();
            $statuses = $statuses->get();
        }


       return response()->json( [
            'categories' => $categories,
            'users' => $users,
            'priorities' => $priorities,
            'statuses' => $statuses,
            'cities' => $cities, ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AppMailer $mailer, Ticket $ticket)
    {
        
             $role = Role::where('name', 'it')->first();
        $role_id = $role->id;
        $city = logged_in_user()->citie;

        $it_with_fewest_tickets = DB::select("SELECT users.id, COUNT(tickets.it_agent_id) AS tickets_count FROM users
                LEFT JOIN tickets on users.id = tickets.it_agent_id
                WHERE role_id=$role_id AND users.citie_id=$city->id
                GROUP BY users.id
                ORDER BY tickets_count asc");

        if (count($it_with_fewest_tickets) == 0) {
            $it_with_fewest_tickets = null;
        } else {
            $it_with_fewest_tickets = $it_with_fewest_tickets[0]->id;
        }

        $this->ticketRepository->store($request->all(), $it_with_fewest_tickets);

        $city = logged_in_user()->citie;
        $cc = $city->users()->where('id', $it_with_fewest_tickets)->pluck('email')->all();

        $mailer->sendTicketInformation(Auth::user(), $ticket, $cc);
         return response()->json('tickets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = $this->ticketRepository->find($id);
        $categories = Categorie::query();
        $priorities = Priority::query();
        $users = User::query();
        $statuses = Status::query();
        $cities = Citie::query();

        $categories = $categories->get();
        $priorities = $priorities->get();
        $users = $users->get();
        $statuses = $statuses->get();
        $cities = $cities->get();

         return response()->json(['ticket' => $ticket,
            'categories' => $categories,
            'users' => $users,
            'priorities' => $priorities,
            'statuses' => $statuses,
            'cities' => $cities,
        ]);
    }
    public function edit( $id)
    {

$ticket = Ticket::find($id);

        $this->authorize('update', $ticket);
        $categories = Categorie::query();
        $priorities = Priority::query();
        $users = User::query();
        $statuses = Status::query();
        $cities = Citie::query();

        if (hasRole('admin')) {
            $categories = $categories->get();
            $priorities = $priorities->get();
            $users = $users->get();
            $statuses = $statuses->get();
            $cities = $cities->get();

        }

        if (hasRole('it')) {
            $categories = $categories->get();
            $priorities = $priorities->get();
            $statuses = $statuses->get();

        }

        if (hasRole('agent')) {

            $categories = $categories->get();
            $priorities = $priorities->get();
            $statuses = $statuses->get();

        }

        return response()->json(['ticket' => $ticket,
            'categories' => $categories,
            'users' => $users,
            'priorities' => $priorities,
            'statuses' => $statuses,
            'cities' => $cities,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, AppMailer $mailer)
    {
       $ticket = Ticket::find($id);
        $this->authorize('update', $ticket);
        $this->ticketRepository->update($id, $request->all());
        $mailer->sendTicketStatusNotification($ticket);

         return response()->json('tickets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->ticketRepository->destroy($id);
       return response()->json('tickets');
    }
}
