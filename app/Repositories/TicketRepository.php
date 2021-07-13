<?php

namespace App\Repositories;

interface TicketRepository
{
    public function selectAll();
    public function find($id);
    public function store(array $data, $it_with_fewest_tickets);
    public function update($id, array $data);
    public function destroy($id);
}
