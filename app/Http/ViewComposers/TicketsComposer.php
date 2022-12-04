<?php

namespace App\Http\ViewComposers;

use App\Models\Ticket;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TicketsComposer
{

    private $tickets;
    private $status;

    public function __construct(Ticket $tickets, Request $request)
    {
        $this->tickets = $tickets;
        $this->status = $request->session()->get('ticketStatus') ?? 1;
    }

    public function compose(View $view)
    {
        $view->with('tickets', $this->tickets->where('status', $this->status)->latest()->get());
    }
}
