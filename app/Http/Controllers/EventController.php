<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date')->get();
        
        // return $events;
        return view('events.index', [
            'events' => $events,
        ]);
    }

    public function show(int $id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', [
            'event' => $event,
        ]);
    }
}
