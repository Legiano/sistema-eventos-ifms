<?php

namespace App\Http\Controllers;

use App\Models\Memory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemoryController extends Controller
{
    //Memories
    public function index()
    {
        $search = request('search');
        $memories = $search
            ? Memory::where('title', 'like', '%' . $search . '%')->get()
            : Memory::all();

        return view('memories', ['memories' => $memories, 'search' => $search]);
    }

    public function create()
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/')->with('msg', 'Você não tem permissão para fazer isso!');
        }

        return view('memories.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/')->with('msg', 'Você não tem permissão para criar eventos!');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'text' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'string|max:255',
        ]);

        $memory = new Memory;
        $memory->fill($request->except('image', 'memory'));
        //$memory->user_id = Auth::user()->id; Não criado ainda

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/memories'), $imageName);
            $memory->image = $imageName;
        }

        /* Implementar envio de múltiplas imagens
        if ($request->has('items')) {
            $event->items = implode(',', $request->items);
        }*/

        $memory->save();

        return redirect('/memories')->with('msg', 'Memória criada com sucesso!');
    }

    public function show($id)
    {
        $memory = Memory::findOrFail($id);

        return view('memories.show', [
            'memory' => $memory
        ]);
    }
}
