<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticket;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;


class TicketController extends Controller
{
    /**
     * @param Request $request
     * @return void
     * create ticket
     */
    public function createticket(Request $request){
        $phonenum = $request->phone;
        $pcode = $request->ccode;
        $reference = substr(md5(uniqid()), 0, 10);
        $ticket = new ticket;
        $ticket->name = $request->name;
        $ticket->reference = $reference;
        $ticket->email = $request->email;
        $ticket->phone = $pcode.$phonenum;
        $ticket->Description = $request->Description;
        $ticket->view = 0;
        $ticket->status = 'TO DO';
        $ticket->agent_id = '0';
        $ticket->save();

        $details = [
            'title' => 'Your Ticket is Created',
            'name' => $request->name,
            'email' => $request->email,
            'phone'=> $request->$pcode.$phonenum,
            'status'=>'TO Do',
            'message'=> $request->Description,
            'reference' => $reference
        ];
        \Mail::to($request->email)->send(new \App\Mail\createmail($details));

        Alert::success('Ticket created & check your Email!', 'Your ticket reference number is ' . $reference);
        return back();

    }

    /**
     * @param Request $request
     * @return string|void
     * srach ajax
     */
    public function searchtx(Request $request){
        $ticketID = $request->ticketID;
        $ticket = ticket::where('reference', $ticketID)->first();

        if($ticket->reference){
            $x = "<div class='card text-center'>
            <div class='card-header'>
                Ticket Reference: " . $ticket->reference . "
            </div>
            <div class='card-body'>
                <h5 class='card-title'>" . $ticket->status . "</h5><hr>
                <p class='card-text'>Your Problem: ". $ticket->Description . "</p><hr>
                <p class='card-text'><b>Support agent Reply: " .  $ticket->reply. "</b></p>
            </div>
            <div class='card-footer text-muted'>
                Support agent ID: " .$ticket->agent_id . "
            </div>
        </div>";
            return $x;

        }
    die();
    }

    /**
     * @return void
     * single ticket view
     */
    public function viewticket($RID){
        $ticket = Ticket::where('reference', $RID)->first();
        if($ticket->reply){
            $ticketx = ticket::where('reference', $RID)->get();
            return view('single_ticket_view',['tickets' => $ticketx]);
        }else{
            Ticket::where('reference', $RID)
                ->update(['status' => 'IN PROGRESS']);
            $ticketx = ticket::where('reference', $RID)->get();
            return view('single_ticket_view',['tickets' => $ticketx]);
        }

    }

    /**
     * @param Request $request
     * @return void
     * Ticket update
     */
    public function update_ticket(Request $request)
    {
        $sid = auth()->id();
        $ticket = Ticket::where('reference', $request->reference)->first();
        if (!$ticket) {
            return back()->withErrors('Ticket not found.');
        }
        $ticket->status = 'DONE';
        $ticket->agent_id =  $sid;
        $ticket->reply =$request->reply;
        $ticket->save();

        $details = [
            'title' => 'Your Ticket Has Been Updated',
            'reference' => $request->reference,
            'description' => $request->description,
            'status' => 'DONE',
            'reply' => $request->reply,
        ];
        \Mail::to($ticket->email)->send(new \App\Mail\ReplyMail($details));

        Alert::success('Ticket updated successfully!');

        return back();
    }

}
