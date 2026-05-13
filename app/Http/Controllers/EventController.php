<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->take(4)->get();
        return view('beranda', compact('events'));
    }
    
    public function explore()
    {
        $events = Event::latest()->get();
        return view('jelajah', compact('events'));
    }
}