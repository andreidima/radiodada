<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Piesa;
use App\Models\Propunere;

use Illuminate\Support\Facades\Validator;

class VoteazaPropuneController extends Controller
{
    /**
     * Formular de votare piesa sau propunere piesa
     */
    public function create()
    {
        // config(['session.same_site' => 'none']);
        // dd(config('session.same_site'));
        $piese = Piesa::with('artist')->orderByDesc('voturi')->get();

        return view('voteaza_si_propune.create', compact('piese'));
    }


    /**
     * Salvează votarea piesei sau piesa propusa
     */
    public function store(Request $request)
    {
        // dd(config('session.same_site'));
        switch ($request->input('action')) {
            case 'top_international_voteaza':
                if ($request->session()->has('top_international_votat_deja_variabila_sesiune')) {
                    return back()->with('top_international_votat_deja', 'Ai votat deja pentru o piesă din acest top. Poți vota o singură dată.');
                } else {
                    request()->validate(
                        ['top_international_piesa' => 'required|integer'],
                        ['top_international_piesa.required' => 'Selectează piesa pe care dorești să o votezi.']
                    );

                    $piesa = Piesa::find($request->top_international_piesa);
                    $piesa->voturi ++ ;
                    $piesa->save();

                    $request->session()->put('top_international_votat_deja_variabila_sesiune', 'da');

                    // $request->session()->flash('Voteaza', 'Votul dumneavoastră pentru „' . ($piesa->artist->nume ?? '') . ' - ' . $piesa->nume . '” a fost inregistrat!');

                    return back()->with('top_international_votat', 'Votul dumneavoastră pentru „' . ($piesa->artist->nume ?? '') . ' - ' . $piesa->nume . '” a fost inregistrat!');
                    // return back();
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
