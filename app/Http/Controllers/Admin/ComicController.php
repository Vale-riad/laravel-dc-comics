<?php

namespace App\Http\Controllers\Admin;
use App\Models\Comic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view("comics.index", compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'title' => 'required| string| between:10,50',
                'series' => 'required| string| between:10,50',
                'sale_date' => 'nullable| date',
                'type' => ['required',
                Rule::in(['comic-book','graphic-novel'])
            ],
            'description' => 'required| string| between:10,50',
            'price' => 'required| numeric| between:0.01, 9999.99',

            ]);
        $data = $request->all();
        // creo l'oggetto model
        $new_comic = new Comic();
        // compilo l'oggetto (o meglio le sue proprietà)
        $new_comic->fill($data);
        $new_comic->save();

        // rendirizzo l'utente alla pagina della pasta appena creata
        return redirect()->route('comics.show', $new_comic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        //recupero tutti i dati del form
        $data = $request->all();
        //aggiorno la risorsa per intero
        $comic->update($data);
        //faccio un redirect alla pagina della risorsa aggiornta(show in questo caso)
        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');

    }
}
