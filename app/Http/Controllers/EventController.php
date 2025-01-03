<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        // $availableEvents = Event::where('status', 'open')
        //     ->orderBy('date')
        //     ->get();

        // $previousEvents = Event::where('status', 'closed')
        //     ->orderBy('date', 'desc')
        //     ->get();

        // return view('events.index', compact('availableEvents', 'previousEvents'));

        $availableEvents = Event::where('status', 'open')
            ->orderBy('date')
            ->paginate(6);

        $previousEvents = Event::where('status', 'closed')
            ->orderBy('date', 'desc')
            ->paginate(3);

        return view('events.index', compact('availableEvents', 'previousEvents'));
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function register(Request $request, Event $event)
    {
        // Add event registration logic here
        // You might want to create an EventRegistration model and table

        return back()->with('success', 'Successfully registered for the event!');
    }
}
