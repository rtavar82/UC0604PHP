<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        $actors = Actor::query()
            ->withCount('movies')
            ->orderBy('name')
            ->paginate(10);

        $area = $this->routeArea();

        return view('atores.index', compact('actors', 'area'));
    }

    public function create()
    {
        $movies = Movie::orderBy('title')->get();

        $area = $this->routeArea();

        return view('atores.create', compact('movies', 'area'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'birth_date'  => ['nullable', 'date'],
            'nationality' => ['nullable', 'string', 'max:100'],
            'biography'   => ['nullable', 'string'],
            'movies'      => ['nullable', 'array'],
            'movies.*'    => ['exists:movies,id'],
        ]);

        $actor = Actor::create([
            'name'        => $validated['name'],
            'birth_date'  => $validated['birth_date'] ?? null,
            'nationality' => $validated['nationality'] ?? null,
            'biography'   => $validated['biography'] ?? null,
        ]);

        $actor->movies()->sync($validated['movies'] ?? []);

        return redirect()
            ->route($this->routeArea() . '.actors.index')
            ->with('success', 'Ator criado com sucesso.');
    }

    public function show(Actor $actor)
    {
        $actor->load('movies');

        $area = $this->routeArea();

        return view('atores.show', compact('actor', 'area'));
    }

    public function edit(Actor $actor)
    {
        $actor->load('movies');

        $movies = Movie::orderBy('title')->get();

        $area = $this->routeArea();

        return view(
            'atores.edit',
            compact('actor', 'movies', 'area')
        );
    }

    public function update(Request $request, Actor $actor)
    {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'birth_date'  => ['nullable', 'date'],
            'nationality' => ['nullable', 'string', 'max:100'],
            'biography'   => ['nullable', 'string'],
            'movies'      => ['nullable', 'array'],
            'movies.*'    => ['exists:movies,id'],
        ]);

        $actor->update([
            'name'        => $validated['name'],
            'birth_date'  => $validated['birth_date'] ?? null,
            'nationality' => $validated['nationality'] ?? null,
            'biography'   => $validated['biography'] ?? null,
        ]);

        $actor->movies()->sync($validated['movies'] ?? []);

        return redirect()
            ->route($this->routeArea() . '.actors.index')
            ->with('success', 'Ator atualizado com sucesso.');
    }

    public function destroy(Actor $actor)
    {
        $actor->delete();

        return redirect()
            ->route('admin.actors.index')
            ->with('success', 'Ator eliminado com sucesso.');
    }

    public function trashed()
    {
        $actors = Actor::onlyTrashed()
            ->orderBy('name')
            ->paginate(10);

        $area = $this->routeArea();

        return view('atores.trashed', compact('actors', 'area'));
    }

    public function restore(int $id)
    {
        $actor = Actor::onlyTrashed()
            ->findOrFail($id);

        $actor->restore();

        return redirect()
            ->route('admin.actors.trashed')
            ->with('success', 'Ator restaurado com sucesso.');
    }

    public function forceDelete(int $id)
    {
        $actor = Actor::onlyTrashed()
            ->findOrFail($id);

        $actor->forceDelete();

        return redirect()
            ->route('admin.actors.trashed')
            ->with('success', 'Ator eliminado definitivamente.');
    }
}
