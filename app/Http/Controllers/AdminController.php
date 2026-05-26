<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //public function __construct()
    //{
    //    $this->middleware('admin');
    //}
    
    public function dashboard()
    {
        $totalEvents = Event::count();
        $totalRevenue = Order::where('status', 'success')->sum('total_price');
        $totalOrders = Order::where('status', 'success')->count();
        $events = Event::latest()->paginate(10);
        return view('admin.dashboard', compact('events', 'totalEvents', 'totalRevenue', 'totalOrders'));
    }
    
    public function create()
    {
        return view('admin.events-create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        
        $event = new Event();
        $event->name = $request->name;
        $event->date = $request->date;
        $event->price = $request->price;
        $event->location = $request->location;
        $event->category = $request->category;
        $event->is_recommended = $request->has('is_recommended');
        $event->is_popular = $request->has('is_popular');
        
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/events'), $imageName);
            $event->image = 'uploads/events/' . $imageName;
        }
        
        $event->save();
        
        return redirect()->route('admin.dashboard')->with('success', 'Event berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event-edit', compact('event'));
    }
    
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        
        $event->name = $request->name;
        $event->date = $request->date;
        $event->price = $request->price;
        $event->location = $request->location;
        $event->category = $request->category;
        $event->is_recommended = $request->has('is_recommended');
        $event->is_popular = $request->has('is_popular');
        
        if($request->hasFile('image')) {
            if($event->image && file_exists(public_path($event->image))) {
                unlink(public_path($event->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/events'), $imageName);
            $event->image = 'uploads/events/' . $imageName;
        }
        
        $event->save();
        
        return redirect()->route('admin.dashboard')->with('success', 'Event berhasil diupdate!');
    }
    
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        
        if($event->image && file_exists(public_path($event->image))) {
            unlink(public_path($event->image));
        }
        
        $event->delete();
        
        return redirect()->route('admin.dashboard')->with('success', 'Event berhasil dihapus!');
    }

    public function orders()
    {
        $orders = Order::with('user', 'event')->where('status', 'success')->latest()->paginate(15);
        $totalRevenue = Order::where('status', 'success')->sum('total_price');
        return view('admin.orders', compact('orders', 'totalRevenue'));
    }
}