<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Event;
use App\Models\Link;
use Illuminate\Support\Carbon;
use App\Models\User;
class UsersController extends Controller
{
    //
    public function index()

    {

        $currentDate = Carbon::now();

        $firstEvent = Event::orderBy('created_at', 'desc')
            ->where('date', '>=', $currentDate)
            ->get();
        $users = User::count();

        $event = Event::orderBy('created_at', 'desc')->first();
        $past_events = Event::orderBy('created_at', 'desc')->skip(1)->take(1)->get();

        $link = Link::orderBy('created_at', 'desc')->get();

        return Inertia::render('UsersDashboard',[
            'event' => $event,
            'past_events' => $past_events,
            'links' => $link,
            'counts' => $users,
        ]);
    }
}
