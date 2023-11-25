<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Invitation;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::where('id_event', 1)->first();
        return view("event.index", compact('event'));
    }

    public function setEvent(Request $request)
    {
        Event::where('id_event', 1)->update([
            "name_event"        => $request->name,
            "type_event"        => $request->type,
            "location_event"    => $request->location,
            "start_event"       => $request->start,
            "end_event"         => $request->end,
            "information_event" => $request->information,
        ]);

        return redirect('event')->with("success", "data berhasil diedit");
    }


}
