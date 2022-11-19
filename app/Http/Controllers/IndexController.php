<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Index;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Categories;
use App\Models\Etudiant;
use App\Models\Ville;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{

    public function index()
    {
        /* On appele la classe du model Etudiant */
        $etudiants = Etudiant::select(
            'etudiants.*',
            'villes.nom as ville_nom'
        )
        ->join('villes', 'etudiants.villeId', '=', 'villes.id')
        ->orderBy('etudiants.nom', 'ASC')
        ->get(); //récupérer tous les étudiants de la DB */

        /* renvoie les etudiants récupérés vers la vue etudiant.index */ 
        return  view('etudiant.index', ['etudiants' => $etudiants]);
         
    }

    public function show(Etudiant $etudiant)
    {   
        return  view('etudiant.show', ['etudiant' => $etudiant]);
    }


    public function create(Etudiant $etudiant)
    {   
         /* On appele la classe du model Ville */
         $villes = Ville::select(
            'villes.*'
         )
         ->orderBy('villes.nom', 'ASC')
         ->get(); 

        /* renvoie les villes récupérées vers la vue etudiant.create */ 
         return view('etudiant.create',['villes' =>$villes]);
    }

   /*  function store va enregitrer chaque nouvel etudiant crée dans la db */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required|max:20',
            'adresse'=>'required|min:10|max:50',
            'phone'=>'required|min:10|max:15',
            'date_naissance'=> 'required|date|date_format:Y-m-d',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20',
        ]);

        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $userId = $user->save();

        $newEtudiant= Etudiant::create([
            'nom'=>$request->nom,
            'adresse'=>$request->adresse,
            'phone'=>$request->phone,
            'date_naissance'=>Carbon::parse($request->date_naissance)->format('Y-m-d'),
            'villeId'=>$request->ville,
            'userId'=>$userId
        ]);
        return redirect(route('etudiant.show', $newEtudiant)); 
    }

    public function destroy(Etudiant $etudiant)
    {
        $userId = $etudiant->userId;
        $etudiant->delete();
        return redirect(route('etudiant.index'));
    }

    public function edit(Etudiant $etudiant)
    {   
        /* On appelle la classe du model Ville */
        $villes = Ville::select(
        'villes.*'
        )
        ->orderBy('villes.nom', 'ASC')
        ->get(); 
        return  view('etudiant.edit', [
            'etudiant' => $etudiant,
            'villes' =>$villes
        ]);
    }

    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'nom'=>'required|max:20',
            'adresse'=>'required|min:10|max:50',
            'phone'=>'required|min:10|max:15',
            'date_naissance'=> 'required|date|date_format:Y-m-d'
        ]);


        $etudiant->update([
            'nom'=>$request->nom,
            'adresse'=>$request->adresse,
            'phone'=>$request->phone,
            'date_naissance'=>Carbon::parse($request->date_naissance)->format('Y-m-d'),
            'villeId'=>$request->ville
        ]);
        return redirect(route('etudiant.show', $etudiant->id));
    }

}
