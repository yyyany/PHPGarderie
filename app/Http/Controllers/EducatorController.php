<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;
use App\Models\State;
use App\Models\Educators;
use App\Models\Presences;

class EducatorController extends Controller
{
    public function index()
    {
        $educators = Educators::all();
        $states = State::all();
        return view('Educator', [
            'educators' => $educators,
            'states' => $states
        ]);
    }
    

    public function add(Request $request)
    {
        Educators::create([
            'FirstName' => $request->nom,
            'LastName' => $request->prenom,
            'BirthDayDate' => $request->date_naissance,
            'Adress' => $request->adresse,
            'City' => $request->ville,
            'State' => $request->province,
            'Phone' => $request->telephone,
        ]);

        return redirect()->route('educator.index');
    }

    public function formModifyEducator($id)
    {
        $educator = Educators::find($id);
        $states = State::all();
        if (!$educator) {
            return redirect()->route('educator.index')->with('error', 'L\'éducateur demandé n\'existe pas');
        }
        
        // Récupérer les présences de l'éducateur
        $presences = Presences::where('educator_id', $id)->get();
        
        return view('EducatorModify', [
            'educator' => $educator,
            'states' => $states,
            'presences' => $presences
        ]);
    }

    public function update($id, Request $request)
    {
        $educator = Educators::find($id);
        if (!$educator) {
            return redirect()->route('educator.index')->with('error', 'L\'enfant demandé n\'existe pas');
        }
        $educator->update([
            'BirthDayDate' => $request->date_naissance,
            'Adress' => $request->adresse,
            'City' => $request->ville,
            'State' => $request->province,
            'Phone' => $request->telephone,
        ]);
        return redirect()->route('educator.index');
    }

    public function delete($id)
    {
        $educator = Educators::find($id);
        if (!$educator) {
            return redirect()->route('educator.index')->with('error', 'L\'enfant demandé n\'existe pas');
        }
        $educator->delete();
        return redirect()->route('educator.index');
    }

    public function clear()
    {
        Educators::truncate();
        return redirect()->route('educator.index');
    }
} 