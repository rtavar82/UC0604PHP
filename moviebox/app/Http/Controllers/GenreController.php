<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;


/**
 * ieafoiesfuio
 * @extends Controller
 */
class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if($this->routeArea() === 'admin'){
            $genres=Genre::withTrashed()->get();
            //$genres=Genre::onlyTrashed()->get();
        }else{
            //editor ou user
            $genres = Genre::all();

        }


        $area=$this->routeArea();
        //dd($genres);
        return view('generos.index', compact('genres','area'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('generos.create');
    }


    /**
     * ksduygisuyg
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //Validar - Regras de Negocio
        //dd($request->all())
        $validated=$request->validate([
            'name'=>'required|min:3|max:100'
        ]);
        $genero=Genre::create($validated);
        return redirect()->route($this->routeArea().'.genres.index')
            ->with('success',"O género {$genero->name} foi criado com sucesso, com o ID {$genero->id}!");

    }


    /**
     * iutyeroiutyeroi
     * @param Genre $genre
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function edit(Genre $genre)
    {
        return view('generos.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        //dd($request->all());
        $validated=$request->validate([
            'name'=>'required|min:3|max:100'
        ]);
        $genre->update($validated);
        $genre->save();
        return redirect()->route($this->routeArea().'.genres.index')
            ->with('success',"O género {$genre->name} foi atualizado com sucesso");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $genre=Genre::withTrashed()->findOrFail($id);
        if($genre->trashed()){
            $genre->forceDelete();

            return redirect()->route($this->routeArea().'.genres.index')
                ->with('success','Género Apagado com sucesso!')
                ->with('warning','Azar já não pode ser recuperado!');
        }

        $genre->delete();
        return redirect()->route($this->routeArea().'.genres.index')
            ->with('success','Género Apagado Logicamente!');

    }
}
