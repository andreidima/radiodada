<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Piesa;

class PiesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categorie = null)
    {
        $search_titlu = \Request::get('search_titlu');
        $search_artist = \Request::get('search_artist');
        $piese = Piesa::
            when($search_titlu, function ($query, $search_titlu) {
                return $query->where('titlu', 'like', '%' . $search_titlu . '%');
            })
            ->when($search_artist, function ($query, $search_artist) {
                return $query->where('artist', 'like', '%' . $search_artist . '%');
            })
            ->when($categorie, function ($query, $categorie) {
                return $query->where('categorie', 'like', '%' . $categorie . '%');
            })
            ->when(!$categorie, function ($query, $categorie) {
                return $query->where('categorie', '<>', 'Asteapta aprobare');
            })
            ->orderByDesc('voturi')
            // ->latest()
            ->simplePaginate(25);
        return view('piese.index', compact('piese', 'search_titlu', 'search_artist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('piese.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $piesa = Piesa::create($this->validateRequest($request));

        return redirect('/piese')->with('status', 'Piesa „' . $piesa->titlu . '” a fost adăugată cu succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientNeserios  $piesa
     * @return \Illuminate\Http\Response
     */
    public function show(Piesa $piesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piesa  $piesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Piesa $piesa)
    {
        return view('piese.edit', compact('piesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Piesa  $piesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piesa $piesa)
    {
        $piesa->update($this->validateRequest($request));

        return redirect('/piese')->with('status', 'Piesa "' . $piesa->titlu . '" a fost modificată cu succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Piesa  $piesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piesa $piesa)
    {
        $piesa->delete();
        return redirect('/piese')->with('status', 'Piesa "' . $piesa->titlu . '" a fost ștearsă cu succes!');
    }

    /**
     * Validate the request attributes.
     *
     * @return array
     */
    protected function validateRequest(Request $request)
    {
        return request()->validate([
            'titlu' => ['required', 'max:250'],
            'artist' => ['nullable', 'max:250'],
            'categorie' => ['required', 'max:250']
        ]);
    }
}
