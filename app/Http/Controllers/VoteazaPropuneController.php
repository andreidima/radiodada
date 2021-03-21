<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Piesa;
use App\Models\Propunere;

class VoteazaPropuneController extends Controller
{
    /**
     * Formular de votare piesa sau propunere piesa
     */
    public function create()
    {
        $piese = Piesa::with('artist')->orderByDesc('voturi')->get();

        return view('voteaza_si_propune.create', compact('piese'));
    }


    /**
     * Salvează votarea piesei sau piesa propusa
     */
    public function store(Request $request)
    {
        switch ($request->input('action')) {
            case 'Voteaza':
                // if ($request->session()->has('votat_deja')) {
                //     return back()->with('error', 'Ai votat deja pentru o piesă din acest top. Poți vota o singură dată.');
                // } else {
                    $piesa = Piesa::find($request->voteazaPiesa);
                    $piesa->voturi ++ ;
                    $piesa->save();

                    $request->session()->put('votat_deja', 'da');

                    return redirect('/voteaza_si_propune/mesaj')->with('status', 'Votul dumneavoastră pentru „' . ($piesa->artist->nume ?? '') . ' - ' . $piesa->nume . '” a fost inregistrat!');
                // }
                break;

            case 'Propunere':
                if ($request->session()->has('propus_deja')) {
                    return back()->with('error', 'Ai propus deja o piesă pentru acest top. Poți propune o singură dată.');
                } else {
                    $propunere = new Propunere;
                    $propunere->nume = $request->propunere;
                    $propunere->save();

                    $request->session()->put('propus_deja', 'da');

                    return back()->with('status', 'Ai propus piesa „' . $propunere->nume . '”!');
                }
                break;
        }
            return back()->with('status', 'Ai votat' . $request->voteazaPiesa);
        // dd($request, $request->input('action'));
    }

    public function mesaj()
    {
        return view('voteaza_si_propune.mesaj');
    }

    public function voteazaPropune(Request $request)
{
        switch ($request->input('action')) {
            case 'Voteaza':
                if ($request->session()->has('votat_deja')) {
                    return back()->with('error', 'Ai votat deja pentru o piesă din acest top. Poți vota o singură dată.');
                } else {
                    $piesa = Piesa::find($request->voteazaPiesa);
                    $piesa->voturi ++ ;
                    $piesa->save();

                    $request->session()->put('votat_deja', 'da');

                    return back()->with('status', 'Votul dumneavoastră pentru „' . $piesa->autor->nume . ' - ' . $piesa->nume . '” a fost inregistrat!');
                }
                break;

            case 'Propunere':
                if ($request->session()->has('propus_deja')) {
                    return back()->with('error', 'Ai propus deja o piesă pentru acest top. Poți propune o singură dată.');
                } else {
                    $propunere = new Propunere;
                    $propunere->nume = $request->propunere;
                    $propunere->save();

                    $request->session()->put('propus_deja', 'da');

                    return back()->with('status', 'Ai propus piesa „' . $propunere->nume . '”!');
                }
                break;
        }

        $piese = Piesa::with('artist')->orderByDesc('voturi')->get();

        return view('voteaza_si_propune.create', compact('piese'));
    }
}
