<?php

namespace App\Repositories;

use App\Models\Ticket;

class EloquentTicket implements TicketRepository
{

    public function selectAll()
    {
        $user = logged_in_user();

        if (hasRole('it')) {
            return Ticket::where('citie_id', $user->citie->id)->get();
        }

        if (hasRole('agent')) {
            return $user->tickets;
        }

        return Ticket::all();
    }

    public function find($id)
    {
        return Ticket::find($id);
    }

    public function store($data, $it_with_fewest_tickets)
    {
        return Ticket::create(array(
            'subject' => $data['subject'],
            'description' => $data['description'],
            'user_id' => logged_in_user()->id,
            'status_id' => $data['status_id'],
            'categorie_id' => $data['categories_id'],
            'priority_id' => $data['priority_id'],
            'citie_id' => logged_in_user()->citie_id,
            'it_agent_id' => $it_with_fewest_tickets,
        ));
    }

    public function update($id, array $data)
    {

        if (hasRole('admin')) {
            $this->find($id)->update(array(
                'subject' => $data['subject'],
                'description' => $data['description'],
                'user_id' => $data['user_id'],
                'status_id' => $data['status_id'],
                'categorie_id' => $data['categories_id'],
                'priority_id' => $data['priority_id'],
                'citie_id' => $data['citie_id'],

            )
            );

        }

        if (hasRole('it')) {
            $this->find($id)->update(array(
                'description' => $data['description'],

                'status_id' => $data['status_id'],
                'categorie_id' => $data['categories_id'],
                'priority_id' => $data['priority_id'],
            ));
        }

        if (hasRole('agent')) {
            $this->find($id)->update(array(
                'description' => ($data['description']),

            ));

        }

    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);

        $ticket->delete();

    }
}
