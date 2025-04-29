<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;
use App\Models\Presences;

class ChildController extends Controller
{
    public function index()
    {
        $children = Child::all();
        return view('child', ['children' => $children]);
    }

    public function add(Request $request)
    {
        Child::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'province' => $request->province,
            'telephone' => $request->telephone,
        ]);

        return redirect()->route('child.index');
    }

    public function formModifyChild($id)
    {
        $child = Child::find($id);
        if (!$child) {
            return redirect()->route('child.index')->with('error', 'L\'enfant demandé n\'existe pas');
        }
        // Récupérer les présences de l'enfant
        $presences = Presences::where('child_id', $id)->get();
        
        return view('childModify', [
            'child' => $child,
            'presences' => $presences
        ]);
    }

    public function update($id, Request $request)
    {
        $child = Child::find($id);
        if (!$child) {
            return redirect()->route('child.index')->with('error', 'L\'enfant demandé n\'existe pas');
        }

        $child->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'province' => $request->province,
            'telephone' => $request->telephone,
        ]);

        return redirect()->route('child.index');
    }

    public function delete($id)
    {
        $child = Child::find($id);
        if (!$child) {
            return redirect()->route('child.index')->with('error', 'L\'enfant demandé n\'existe pas');
        }
        $child->delete();
        return redirect()->route('child.index');
    }

    public function clear()
    {
        Child::truncate();
        return redirect()->route('child.index');
    }
} 