<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoteazaPropuneController extends Controller
{
    /**
     * Formular de votare piesa sau propunere piesa
     */
    public function create()
    {
        $piese = \App\Models\Piesa::with('artist')->orderByDesc('voturi')->get();

        return view('voteaza_si_propune.create', compact('piese'));
    }


    /**
     * Salvează votarea piesei sau piesa propusa
     */
    public function store(Request $request)
    {
        switch ($request->input('action')) {
            case 'Voteaza':
                echo 'votat';
                break;

            case 'Propunere':
                echo 'propus';
                break;
        }
        echo 'final';
        dd($request, $request->input('action'));
    }
}
