<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Services\CalendarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $calendarService;

    /**
     * Inject the CalendarService dependency.
     */
    public function __construct(CalendarService $calendarService)
    {
        $this->calendarService = $calendarService;
    }

    /**
     * Display the dashboard with the next event and tagged events.
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        // Fetch the user's next upcoming event
        $nextEvent = $user->events()
            ->where('start_time', '>=', now())
            ->orderBy('start_time', 'asc')
            ->first();

        $taggedEvents = collect([]);

        // Fetch events tagged with the user's tags
        if ($user->tags->isNotEmpty()) {
            $userTagIds = $user->tags->pluck('id')->toArray();

            $taggedEvents = Event::whereHas('tags', function ($query) use ($userTagIds) {
                $query->whereIn('tags.id', $userTagIds);
            })
                ->where('start_time', '>=', now())
                ->orderBy('start_time', 'asc')
                ->limit(9)
                ->get();
        }

        // Pass data to the dashboard view
        return view('dashboard', [
            'nextEvent' => $nextEvent,
            'taggedEvents' => $taggedEvents,
        ]);
    }

    /**
     * Export all upcoming events as an ICS file.
     */
    public function exportAllEvents()
    {
        /** @var User $user */
        $user = Auth::user();

        // Fetch all upcoming events for the user
        $events = $user->events()
            ->where('start_time', '>=', now())
            ->orderBy('start_time')
            ->get();

        // Redirect back if no events are found
        if ($events->isEmpty()) {
            return redirect()->route('dashboard')->with('error', 'You have no upcoming events to export.');
        }

        // Generate ICS content for the events
        $icsContent = $this->calendarService->generateEventsIcs($events);

        // Return the ICS file as a download
        return response($icsContent)
            ->header('Content-Type', 'text/calendar')
            ->header('Content-Disposition', 'attachment; filename="my-events.ics"');
    }
}
