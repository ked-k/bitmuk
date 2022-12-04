<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\TicketCommentRequest;
use App\Models\Ticket;
use App\Models\TicketComment;
use Laracasts\Flash\Flash;


class TicketController extends Controller
{
    public function tickets()
    {
        session(['ticketStatus' => 1]);
        return view('backend.ticket.index');
    }

    public function closeTickets()
    {
        session(['ticketStatus' => 0]);
        return view('backend.ticket.index');
    }


    public function ticketDetails($id)
    {
        $ticket = Ticket::with('comments')->find($id);

        return view('backend.ticket.details', compact('ticket'));
    }


    public function ticketComment(TicketCommentRequest $request)
    {

        $input = $request->all();
        $comment = array_merge($input, ['user_id' => 0]);

        TicketComment::create($comment);

        Flash::success('Comment Created');

        return redirect()->back();
    }

    public function ticketClose($id)
    {
        Ticket::find($id)->update(array('status' => 0));
        Flash::success('Ticket  Closed');
        return redirect()->back();
    }
}
