<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\UserEventsAttendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{

    public function index(User $user)
    {
        if ($user->id !== auth()->id()) { //comporbamos que el id que le pasamos por parametro es el mismo del que esta logueado
            return redirect()->route('index', ['user' => auth()->user()->name]);
        }

        $events = Event::where('user_id', $user->id)->paginate(5);

        return view('indexEvents', [
            'user' => $user,
            'events' => $events
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [ //validamos que cumpla los requisitos
            'title' => 'required|max:30',
            'description' => 'required|max:50',
            'location' => 'required|max:30',
            'date' => 'required'
        ]);

        $request->user()->events()->create([ //creamos el evento
            'title' =>  $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'date' => $request->date,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('index', ['user' => auth()->user()->name]);
    }

    public function register($id)
    {
        $event = Event::find($id);
        $idUser = $event->user->id;
        $users = User::where('id', '<>', $idUser)->get();  // especificamos la condición de que el ID de usuario debe ser diferente del ID especificado en la variable $idUser
        $attendees = $event->attendees; //sacamos los asistentes de la tabla pivote registrados en ese evento
        return view('registerAssistant',['event' => $event,'users' => $users, 'attendees' =>$attendees]);
    }

    public function show($id)
    {
        $event = Event::find($id);
        $attendees = $event->attendees;
        return view('show', ['event' => $event, 'attendees' =>$attendees]);
    }


    public function storeAttendee($idEvent, Request $request)
    {
        $event = Event::find($idEvent);
        $userId = $request->input('users');
        $user = User::find($userId);

        if (    $event->attendees()->where('user_id', $userId)->exists()) { //comprobamos antes del registro de que no lo esté ya
            return redirect()->back()->with('error', 'El usuario ya está registrado en el evento.');
        }
        
        $userToRegister = new UserEventsAttendee;
        $userToRegister->user()->associate($user); // Establece la relación con el usuario
        $userToRegister->event()->associate($event); // Establece la relación con el evento
        $userToRegister->save();

        return redirect()->route('index', ['user' => auth()->user()->name]);
    }

    public function edit($id)
    {   
        $event = Event::find($id);

        return view('edit',['event'=>$event]);
    }

    public function update($id, Request $request)
    {
        $event = Event::find($id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->date = $request->date;
        $event->save();
        
        return redirect()->route('index', ['user' => auth()->user()->name]);
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('index', ['user' => auth()->user()->name]);
    }
}
