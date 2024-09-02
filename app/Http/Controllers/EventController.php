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
}
