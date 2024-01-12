<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Event;
use App\Models\Link;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EventsController extends Controller
{
    //
    public function index()
    {

        $events = Event::orderBy('updated_at', 'desc')->get();

        return Inertia::render('Events/Index', [
            'events' => $events
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',


            // 'desc' => 'required|string|max:5000',

            'date' => 'required|date',
        
        ]);


        $event = new Event;
        $event->title = $validatedData['title'];
        $event->desc = $request->input('desc');

        $event->date = $validatedData['date'];
        $event->theme = $request->input('theme');
        $event->guest_speaker = $request->input('guest_speaker');
        $event->verse_chapter = $request->input('verse_chapter');
        $event->content = $request->input('content');
        $event->church_name = $request->input('church_name');

        $event->save();


        // if($request->hasfile('image'))
        // {

        //    foreach($request->file('image') as $imageM)
        //    {
        //        $nameImage = time() . '.' . $imageM->getClientOriginalExtension();
        //        $imageM->move(public_path().'/images/events', $nameImage);
        //        $data[] = $nameImage;
        //    }

        // $event = new Event;
        // $event->title = $validatedData['title'];
        // $event->desc = $validatedData['desc'];
        // $event->image=json_encode($data);
        // $event->date = $validatedData['date'];

        // $event->save();
        // }

        return redirect(route('events.index'));



    }

    public function newEvent()
    {
        $currentDate = Carbon::now();

        $firstEvent = Event::orderBy('created_at', 'desc')
            ->where('date', '>=', $currentDate)
            ->get();


        return Inertia::render('Events/NewEvent', [
            'firstEvent' => $firstEvent
        ]);
    }
    public function linksIndex()
    {
        $links = Link::orderBy('created_at', 'desc')->get();
        return Inertia::render('Events/LinksYoutube', [
            'links' => $links
        ]);
    }
    public function linksStore(Request $request)
    {
         $validatedData = $request->validate([
            'title' => 'required|string|max:255',


            'desc' => 'required|string|max:5000',

            'links' => 'required|string',
        
        ]);

        $link = new Link();

        $link->title = $validatedData['title'];
        $link->links = $validatedData['links'];
        $link->desc = $validatedData['desc'];

        $link->save();

        return redirect(route('links'));

    }

    public function prevEvent()
    {
        $currentDate = Carbon::now();

        $prev_event = Event::where('date', '<=', $currentDate)
        ->orderBy('created_at', 'desc')
        ->take(2)
        ->get();
        // dd($prev_event);

        return Inertia::render(
            'Events/PrevEvent',
            [
                'prev_event' => $prev_event
            ]
        );
    }

    public function getprevEvent()
    {
         $currentDate = Carbon::now();

        $prev_event = Event::where('date', '<=', $currentDate)
        ->orderBy('created_at', 'desc')
        ->paginate(2);

        return response()->json($prev_event);

    }
    public function getnewEvent()
    {
         $currentDate = Carbon::now();

        $new_event = Event::where('date', '>=', $currentDate)
        ->orderBy('created_at', 'desc')
        ->paginate(2);

        return response()->json($new_event);

    }
  public function updateImagePrev(Request $request, $id)
{
    $validatedData = $request->validate([
        'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasfile('image')) {
        try {
            $event = Event::findOrFail($id);

            // Delete existing images
            $existingImages = $event->image ?? [];
            foreach ($existingImages as $existingImage) {
                $imagePath = public_path('images/events/' . $existingImage);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // Upload new images
            $data = [];
            foreach ($request->file('image') as $imageM) {
                $nameImage = time() . '_' . Str::random(10) . '.' . $imageM->getClientOriginalExtension();
                $imageM->move(public_path() . '/images/events', $nameImage);
                $data[] = $nameImage;
            }

            // Update event with new image data
            $event->image = $data;
            $event->save();

            return response()->json([
                'message' => 'Images updated successfully',
                'updated_images' => $data,
            ]);
        } catch (\Exception $e) {
            // Log the error or handle it accordingly
            return response()->json(['message' => 'Error updating images'], 500);
        }
    }
}


    public function getter() 
    {
         $events = Event::orderBy('updated_at', 'desc')->get();

         return response()->json($events);
    }

    public function hitlike(Request $request, $id)
    {
        $request->validate([
            'like' => 'required'
        ]);

        $like = Event::findOrFail($id);

        $like->like = 1;

        $liked = $like->like;

        if($liked) {
            $like++;
        }


    }
    public function getUserData()
{
 $user = auth()->user();

    // Perform a null check before accessing roles
    if ($user) {
        return response()->json([
            'user' => $user,
            'roles' => $user->getRoleNames(), // Get user roles
            'permissions' => $user->getAllPermissions()->pluck('name'),
        ]);
    } else {
        // You can customize the response code and message as needed
    }
}

public function get_yt_links()
{
   $links = Link::orderBy('created_at', 'desc')->paginate(4);



   return response()->json($links);
}



}
