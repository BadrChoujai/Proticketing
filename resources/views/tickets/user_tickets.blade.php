@extends('layouts.globale')
@section('content')

<div class="container-fluid">

<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket"> My Tickets</i>
                </div>
                <div class="panel-body">
                    @if ($tickets->isEmpty())
                        <p>You have not created any tickets.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                <th>Title</th>
                                    <th>Category</th>
                                    <th>Priority</th>

                                    <th>Status</th>
                                    <th>Last Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                  <td>
                                        <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                            #{{ $ticket->ticket_id }} - {{ $ticket->subject }}
                                        </a>
                                    </td>
                                    <td>
                                    @foreach ($categories as $categorie)
                                        @if ($categorie->id === $ticket->categorie_id)
                                            {{ $categorie->name }}
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>
                                    @foreach ($priorities as $priority)
                                        @if ($priority->id === $ticket->priority_id)
                                            {{ $priority->name }}
                                        @endif
                                    @endforeach
                                    </td>
                                     <td>
                                    @if ($ticket->status === 'Open')
                                        <span class="label label-success">{{ $ticket->status['name'] }} </span>
                                    @else
                                        <span class="label label-danger">{{ $ticket->status['name'] }}</span>
                                    @endif
                                    </td>


                                    <td>{{ $ticket->updated_at }}</td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $tickets->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@stop
