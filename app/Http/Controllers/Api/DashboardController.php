<?php

namespace App\Http\Controllers\Api;

use DateTime;
use App\Models\Role;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Citie;

class DashboardController extends Controller
{
    public function Totaltickets()
    {
        // $tickets = DB::table('tickets')
        //     ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
        //     ->groupBy('date')
        //     ->get();
        
        $ticket = Ticket::all();
        $status = Status::where('name', 'closed')->first();
        $ticketc = $status->Ticket;
        $status = Status::where('name', 'open')->first();
        $ticketo = $status->Ticket;
        $categorie = Categorie::where('name', 'Events')->first();
        $categorielo = $categorie->Ticket;
         $categorie = Categorie::where('name', 'Alerts')->first();
        $categorien = $categorie->Ticket;
         $categorie = Categorie::where('name', 'Incidents')->first();
        $categorieh = $categorie->Ticket;
          $categorie = Categorie::where('name', 'Requests')->first();
        $categoriel = $categorie->Ticket;
          $categorie = Categorie::where('name', 'Technique')->first();
        $categoriet = $categorie->Ticket;
         $citie = Citie::where('name', 'tanger')->first();
        $citiet = $citie->tickets;
         $citie = Citie::where('name', 'casa')->first();
        $citiec = $citie->tickets;
           $citie = Citie::where('name', 'marrakech')->first();
        $citiem = $citie->tickets;
           $citie = Citie::where('name', 'tetouan')->first();
        $citiett = $citie->tickets;

        
        return response()->json([
            // "total_tickets" => $tickets
            "total_tickets" => count($ticket),
            "total_closed" => count($ticketc), 
            "total_open" => count($ticketo),
            "cat" => count($categorielo),
            "no" => count($categorien),
             "high" => count($categorieh),
             "low" => count($categoriel),
             "technique" => count($categoriet),
             "citiet" => count($citiet),
             "citiec" => count($citiec),
              "citiem" => count($citiem),
               "citiett" => count($citiett),
         
        ]);
        
    }
    // public function Totalagents()
    // {
    //     $role = Role::where('name', 'agent')->first();
    //     $user = $role->users;
    //     return response()->json(["total_agents" => count($user)]);
    // }

    // public function Totalits()
    // {
    //     $role = Role::where('name', 'it')->first();
    //     $user = $role->users;
    //     return response()->json(["total_its" => count($user)]);
    // }
    public function Totalusers(){


        //   $users_tickets = DB::select("SELECT users.name, COUNT(tickets.user_id) AS tickets_count FROM users
        //         LEFT JOIN tickets on users.id = tickets.user_id
        //         GROUP BY users.id
        //         ORDER BY tickets_count asc" ,
        //     );
    
        //     $users_tickets_open = DB::select("SELECT users.name , COUNT(tickets.user_id) AS  tickets_open FROM users
        //     LEFT JOIN tickets on users.id = tickets.user_id
        //     WHERE status_id = 1 
        //     GROUP BY users.id ", );

        //     $users_tickets_closed = DB::select("SELECT users.name , COUNT(tickets.user_id) AS  tickets_open FROM users
        //     LEFT JOIN tickets on users.id = tickets.user_id
        //     WHERE status_id = 2
        //     GROUP BY users.id ", );

        $users_tickets = User::select('name')->withCount(['tickets', 'tickets as tickets_open' => function($q) {
            $q->where('status_id', 1);
        },'tickets as tickets_closed' => function($q) {
            $q->where('status_id', 2);
        }])->get();

        return response()->json([
                "totaleusers" => $users_tickets,
                // "totalopen" => $users_tickets_open, 
                // "totalclosed" => $users_tickets_closed
            ]); 

    }
    public function Agenttickets(){
        
         if (hasRole('agent')) {
           $user = logged_in_user();
        $ti= $user->tickets;
         return response()->json([
         "total" => count($ti),
 ]);

         }
        
    }


}
