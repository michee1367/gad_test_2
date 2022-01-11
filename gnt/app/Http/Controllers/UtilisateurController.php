<?php

namespace App\Http\Controllers;
use App\Models\Utilisateur;

use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    //
    public function index()
    {
        return Utilisateur::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'sexe'=>'required',
            'age'=>'required',
            'number'=>'required'
        ]);
        return Utilisateur::create($request->all());
    }

    public function show($id)
    {
        return Utilisateur::find($id);
    }

    public function update(Request $request, $id)
    {
        $utilisateur= Utilisateur::find($id);
        $utilisateur->update($request->all());
        return $utilisateur;
    }

    public function destroy($id)
    {
        return Utilisateur::destroy($id);
    }
}
