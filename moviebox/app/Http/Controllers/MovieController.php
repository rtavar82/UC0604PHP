<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::query()
            ->with('genre')
            ->withCount('actors')
            ->orderBy('year', 'desc')
            ->paginate(10);

        $area = $this->routeArea();

        return view('filmes.index', compact('movies', 'area'));
    }

    public function create()
    {
        $genres = Genre::orderBy('name')->get();
        $actors = Actor::orderBy('name')->get();

        $area = $this->routeArea();

        return view(
            'filmes.create',
            compact('genres', 'actors', 'area')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'director' => ['required', 'string', 'max:255'],
            'year' => ['nullable', 'integer', 'min:1888', 'max:' . date('Y')],
            'duration' => ['required', 'integer', 'min:1'],
            'genre_id' => ['required', 'exists:genres,id'],
            'actors' => ['nullable', 'array'],
            'actors.*' => ['exists:actors,id'],
        ]);

        $movie = Movie::create([
            'title' => $validated['title'],
            'director' => $validated['director'],
            'year' => $validated['year'] ?? null,
            'duration' => $validated['duration'],
            'genre_id' => $validated['genre_id'],
        ]);

        $movie->actors()->sync($validated['actors'] ?? []);

        return redirect()
            ->route($this->routeArea() . '.movies.index')
            ->with('success', 'Filme criado com sucesso.');
    }

    public function show(Movie $movie)
    {
        $movie->load(['genre', 'actors']);

        $area = $this->routeArea();

        return view('filmes.show', compact('movie', 'area'));
    }

    public function edit(Movie $movie)
    {
        $movie->load('actors');

        $genres = Genre::orderBy('name')->get();
        $actors = Actor::orderBy('name')->get();

        $area = $this->routeArea();

        return view(
            'filmes.edit',
            compact('movie', 'genres', 'actors', 'area')
        );
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'director' => ['required', 'string', 'max:255'],
            'year' => ['nullable', 'integer', 'min:1888', 'max:' . date('Y')],
            'duration' => ['required', 'integer', 'min:1'],
            'genre_id' => ['required', 'exists:genres,id'],
            'actors' => ['nullable', 'array'],
            'actors.*' => ['exists:actors,id'],
        ]);

        $movie->update([
            'title' => $validated['title'],
            'director' => $validated['director'],
            'year' => $validated['year'] ?? null,
            'duration' => $validated['duration'],
            'genre_id' => $validated['genre_id'],
        ]);

        $movie->actors()->sync($validated['actors'] ?? []);

        return redirect()
            ->route($this->routeArea() . '.movies.index')
            ->with('success', 'Filme atualizado com sucesso.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()
            ->route('admin.movies.index')
            ->with('success', 'Filme eliminado com sucesso.');
    }
}
