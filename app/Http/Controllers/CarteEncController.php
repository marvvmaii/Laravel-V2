<?php

namespace App\Http\Controllers;

use App\Models\CarteEtudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarteEncController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$carteEtudiant = Auth::user()->carte;
        //
        $carteEtudiant = CarteEtudiant::all();
        return  view('pages.index',compact('carteEtudiant')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.creation-carte');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $carteEtudiant = new CarteEtudiant();
        $carteEtudiant->nomEtudiant = $request->get('nomEtudiantFormulaire');
        /***
         * A COMPLETER POUR LE PRENOM ET L'EMAIL
         */
        $nomFichierAttache = time().request()->Fichier->getClientOriginalName();
        $request->Fichier->storeAs('public', $nomFichierAttache);

        $carteEtudiant->prenomEtudiant = $request->get('prenomEtudiantFormulaire');
        $carteEtudiant->Email = $request->get('Email');
        $carteEtudiant->Téléphone = $request->get('Téléphone');
        $carteEtudiant->Fichier = $nomFichierAttache;
        $carteEtudiant->DateEntreEnc = $request->get('DateEntreEnc');
        $carteEtudiant->section = $request->get('section');




        //ENREGISTREMENT DANS LA BASE DE DONNEES
        $carteEtudiant ->save();

        //Auth::user()->carte()->save($carteEtudiant); //enregistre dans la base de donnée

        //redirection vers le dashboard

        return redirect('dashboard');
        //return redirect('demandeCarte')->with('success', 'Une nouvelle demande a été enregistrée');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $carteEtudiant = \App\Models\CarteEtudiant::find($id);
        return view('pages.edit', compact('carteEtudiant', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //




        $carteEtudiant = \App\Models\CarteEtudiant::find($id);
        $carteEtudiant->nomEtudiant = $request->get('nomEtudiant');
        $carteEtudiant->prenomEtudiant = $request->get('prenomEtudiant');
        $carteEtudiant->Email = $request->get('Email');
        $carteEtudiant->DateEntreEnc = $request->get('DateEntreEnc');
        $carteEtudiant->Téléphone = $request->get('Téléphone');
        $carteEtudiant->section = $request->get('section');
        $carteEtudiant->Fichier = $request->get('Fichier');

        $carteEtudiant->save();

        return redirect('demandeCarte');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
