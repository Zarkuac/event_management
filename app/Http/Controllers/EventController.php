<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getEvents(): \Illuminate\Http\JsonResponse
    {
        $events = Events::all();

        return response()->json($events);
    }

    public function getEventById($id) {
        $event = Events::find($id);

        if ($event) {
            return response()->json($event, 200);
        }
        else {
            return response()->json(['message' => 'Event not found'], 400);
        }
    }
}
