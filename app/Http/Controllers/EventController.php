<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // Exibe lista de eventos com busca opcional
    public function index()
    {
        $search = request('search');
        $events = $search
            ? Event::where('title', 'like', '%' . $search . '%')->get()
            : Event::all();

        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    // Exibe o formulário de criação de evento
    public function create()
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/')->with('msg', 'Você não tem permissão para criar eventos!');
        }

        return view('events.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/')->with('msg', 'Você não tem permissão para criar eventos!');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'private' => 'required|boolean',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'items' => 'nullable|array',
            'items.*' => 'string|max:255',
        ]);

        $event = new Event;
        $event->fill($request->except('image', 'items'));
        $event->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/events'), $imageName);
            $event->image = $imageName;
        }

        if ($request->has('items')) {
            $event->items = implode(',', $request->items);
        }

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {
        $user = Auth::user();
        $hasUserJoined = $user ? $user->eventsAsParticipant()->where('event_id', $id)->exists() : false;

        $event = Event::findOrFail($id);
        $eventOwner = $event->user;

        return view('events.show', [
            'event' => $event,
            'eventOwner' => $eventOwner,
            'hasUserJoined' => $hasUserJoined
        ]);
    }

    public function dashboard()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('msg', 'Faça login para acessar o painel!');
        }

        $events = $user->events;
        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', [
            'events' => $events,
            'eventsAsParticipant' => $eventsAsParticipant
        ]);
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $event = Event::findOrFail($id);

        if ($user->id !== $event->user_id && $user->is_admin !== 1) {
            return redirect('/')->with('msg', 'Você não tem permissão para excluir este evento!');
        }

        $event->users()->detach();
        $event->delete();

        return redirect('/')->with('msg', 'Evento excluído com sucesso! 🚀');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $event = Event::findOrFail($id);

        if ($user->id !== $event->user_id && $user->is_admin !== 1) {
            return redirect('/')->with('msg', 'Você não tem permissão para editar este evento!');
        }

        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/')->with('msg', 'Você não tem permissão para editar eventos!');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'city' => 'required|string|max:255',
            'description' => 'nullable|string',
            'items' => 'nullable|array',
            'items.*' => 'string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $event = Event::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/events'), $imageName);
            $data['image'] = $imageName;
        }

        $event->update($data);

        return redirect('/')->with('msg', 'Evento atualizado com sucesso! 🚀');
    }

    public function joinEvent($id)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('msg', 'Faça login para confirmar presença!');
        }

        $event = Event::findOrFail($id);

        if ($user->eventsAsParticipant()->where('event_id', $id)->exists()) {
            return redirect()->back()->with('msg', 'Você já está participando deste evento!');
        }

        $user->eventsAsParticipant()->attach($id);

        return redirect('/')->with('msg', 'Sua presença está confirmada no evento ' . $event->title);
    }

    public function leaveEvent($id)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('msg', 'Faça login para sair do evento!');
        }

        $event = Event::findOrFail($id);

        if (!$user->eventsAsParticipant()->where('event_id', $id)->exists()) {
            return redirect()->back()->with('msg', 'Você não está participando deste evento!');
        }

        $user->eventsAsParticipant()->detach($id);

        return redirect('/')->with('msg', 'Você saiu com sucesso do evento ' . $event->title);
    }
}
