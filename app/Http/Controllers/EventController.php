<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->take(4)->get(); // For fallback or other sections
        $recommendedEvents = Event::where('is_recommended', true)->latest()->take(4)->get();
        $popularEvents = Event::where('is_popular', true)->latest()->take(5)->get();
        
        return view('beranda', compact('events', 'recommendedEvents', 'popularEvents'));
    }
    
    public function explore()
    {
        $events = Event::latest()->get();
        return view('jelajah', compact('events'));
    }
}