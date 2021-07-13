<?php

namespace App\Http\Controllers;

use App\Mailers\AppMailer;
use App\Models\Comment;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listcomment = Comment::query();
        if (hasRole('admin')) {
            $listcomment = $listcomment->get();
        }

        if (hasRole('it')) {
            $listcomment = $listcomment->get();
        }

        if (hasRole('agent')) {
            $listcomment = logged_in_user()->comments;
        }

        return view('comment.index', ['comments' => $listcomment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::query();
        $tickets = Ticket::query();

        if (hasRole('admin')) {

            $users = $users->get();
            $tickets = $tickets->get();

        }

        if (hasRole('it')) {
            $users = $users->get();
            $tickets = $tickets->get();

        }

        if (hasRole('agent')) {

            $users = $users->get();
            $tickets = $tickets->get();

        }

        return view('comment.create', ['users' => $users, 'tickets' => $tickets]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AppMailer $mailer, user $user)
    {

        $comment = new Comment();
        $ticket = Ticket::findOrFail($request->input('ticket_id'));
        $logged_user = logged_in_user()->id;

        if (hasRole('admin') || hasRole('it') || $ticket->user->id == $logged_user) {
            $comment->body = $request->input('body');
            $comment->user_id = $logged_user;
            $comment->ticket_id = $request->input('ticket_id');

            $comment->save();
        }

        if ($ticket->user->id !== logged_in_user()->id) {

            $mailer->sendTicketComments($ticket->user, $ticket, $comment->body);
        } else {

            $mailer->sendTicketComments(User::findOrFail($ticket->it_agent_id), $ticket, $comment->body);
        }

        return redirect()->route('details', ['id' => $ticket->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {

        $comment = Comment::find($id);
        $users = User::query();
        $tickets = Ticket::query();

        if (hasRole('admin')) {

            $users = $users->get();
            $tickets = $tickets->get();
        }
        if (hasRole('it')) {

            $users = $users->get();
            $tickets = $tickets->get();
        }

        return view('comment.edit', ['comment' => $comment, 'users' => $users, 'tickets' => $tickets]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        if (hasRole('admin')) {

            $comment->body = $request->input('body');
            $comment->user_id = $request->input('user_id');
            $comment->ticket_id = $request->input('ticket_id');
            $comment->save();
            return redirect('comments');

        }
        if (hasRole('it')) {

            $comment->body = $request->input('body');
            $comment->user_id = $request->input('user_id');
            $comment->ticket_id = $request->input('ticket_id');
            $comment->save();

        }
        if (hasRole('agent')) {

            $comment->body = $request->input('body');
            $comment->save();
        }

        return redirect('tickets/'.$request->input('ticket_id'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment, $id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect('tickets/' . $comment->ticket->id);

    }

}
