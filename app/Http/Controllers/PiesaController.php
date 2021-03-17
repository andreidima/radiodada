<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Piesa;
use App\Models\Artist;

class PiesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categorie = null)
    {
        $search_nume = \Request::get('search_nume');
        // $search_artist = \Request::get('search_artist');
        $piese = Piesa::
            when($search_nume, function ($query, $search_nume) {
                return $query->where('nume', 'like', '%' . $search_nume . '%');
            })
            // ->when($search_artist, function ($query, $search_artist) {
            //     return $query->where('artist', 'like', '%' . $search_artist . '%');
            // })
            ->when($categorie, function ($query, $categorie) {
                return $query->where('categorie', 'like', '%' . $categorie . '%');
            })
            ->when(!$categorie, function ($query, $categorie) {
                return $query->where('categorie', '<>', 'Asteapta aprobare');
            })
            // ->orderByDesc('voturi')
            ->latest()
            ->simplePaginate(25);
        return view('piese.index', compact('piese', 'search_nume'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artisti = Artist::orderBy('nume')->get();

        return view('piese.create', compact('artisti'));
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
     * @param  \App\Models\Piesa  $piesa
     * @return \Illuminate\Http\Response
     */
    public function show(Piesa $piesa)
    {
        return view('piese.show', compact('piesa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piesa  $piesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Piesa $piesa)
    {
        $artisti = Artist::orderBy('nume')->get();

        return view('piese.edit', compact('piesa', 'artisti'));
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

        return redirect('/piese')->with('status', 'Piesa "' . $piesa->nume . '" a fost modificată cu succes!');
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
            'nume' => 'required|max:250',
            'artist_id' => 'nullable',
            'categorie' => 'required|max:250'
        ]);
    }
}
