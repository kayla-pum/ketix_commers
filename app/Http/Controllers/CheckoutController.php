<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\TicketMail;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $event = Event::findOrFail($id);
        return view('checkout', compact('event'));
    }

    public function store(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'quantity' => 'required|integer|min:1|max:10',
            'attendee_name' => 'required|array|min:1',
            'attendee_ktp' => 'required|array|min:1',
            'attendee_phone' => 'required|array|min:1',
            'attendee_email' => 'required|array|min:1',
            'attendee_name.*' => 'required|string',
            'attendee_ktp.*' => 'required|string',
            'attendee_phone.*' => 'required|string',
            'attendee_email.*' => 'required|email',
        ]);

        $quantity = $request->quantity;
        $total_price = $event->price * $quantity;

        // Create Order
        $order = Order::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'quantity' => $quantity,
            'total_price' => $total_price,
            'status' => 'success'
        ]);

        $tickets = [];

        // Create Tickets
        for ($i = 0; $i < $quantity; $i++) {
            $ticket = Ticket::create([
                'order_id' => $order->id,
                'name' => $request->attendee_name[$i],
                'ktp' => $request->attendee_ktp[$i],
                'phone' => $request->attendee_phone[$i],
                'email' => $request->attendee_email[$i],
                'ticket_code' => 'KTX-' . strtoupper(Str::random(8)) . '-' . $order->id,
            ]);
            $tickets[] = $ticket;
        }

        // Send Email to the first attendee's email (or all of them, but usually primary)
        // We will group tickets by email to avoid sending duplicate emails to the same person
        $ticketsByEmail = collect($tickets)->groupBy('email');
        
        foreach ($ticketsByEmail as $email => $userTickets) {
            try {
                Mail::to($email)->send(new TicketMail($order, $userTickets));
            } catch (\Exception $e) {
                // Log the error but don't stop the checkout process
                \Log::error('Failed to send email to ' . $email . ': ' . $e->getMessage());
            }
        }

        return redirect()->route('checkout.success', $order->id)->with('success', 'Tiket berhasil dipesan!');
    }

    public function success($id)
    {
        $order = Order::where('user_id', Auth::id())->with('event', 'tickets')->findOrFail($id);
        return view('checkout-success', compact('order'));
    }
    
    public function history()
    {
        $orders = Order::where('user_id', Auth::id())->with('event', 'tickets')->latest()->get();
        return view('tiket-ku', compact('orders'));
    }
}
