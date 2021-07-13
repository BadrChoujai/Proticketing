<?php
namespace App\Mailers;

use App\Models\Ticket;
use Illuminate\Contracts\Mail\Mailer;

class AppMailer
{
    protected $mailer;
    protected $fromAddress = 'safaendama09@gmail.com';
    protected $fromName = 'Support Ticket';
    protected $to;
    protected $subject;
    protected $view;
    protected $data = [];
    protected $cc = [];

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendTicketInformation($user, Ticket $ticket, $cc)
    {
        $this->to = $user->email;
        $this->subject = "[Ticket ID: $ticket->ticket_id] $ticket->subject";
        $this->view = 'emails.ticket_info';
        $this->data = compact('user', 'ticket');
        $this->cc = $cc;

        return $this->deliver();
    }

    public function sendTicketStatusNotification(Ticket $ticket)
    {
        $this->to = $ticket->user->email;
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
        $this->view = 'emails.ticket_status';
        $user = $ticket->user;
        $this->data = compact('ticket', 'user');
        return $this->deliver();
    }

    public function sendTicketComments($ticketOwner, Ticket $ticket, $body)
    {
       

        $this->to = $ticketOwner->email;
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
        $this->view = 'emails.ticket_comments';
        $user = logged_in_user();
        $this->data = compact('ticketOwner', 'ticket', 'body', 'user');

        return $this->deliver();
    }

    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function ($message) {
            $message->from($this->fromAddress, $this->fromName)
                ->to($this->to)->subject($this->subject)
                ->cc($this->cc);
        });
    }}
