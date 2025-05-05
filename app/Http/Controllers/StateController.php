<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    public function index()
    {
        $states = State::all();
        return view('Province', [
            'states' => $states
        ]);
    }
    
    public function store(Request $request)
    {
        State::create([
            'description' => $request->description,
        ]);

        return redirect()->route('states.index')->with('success', 'Province ajoutée avec succès');
    }

    public function destroy($id)
    {
        $state = State::find($id);
        if (!$state) {
            return redirect()->route('states.index')->with('error', 'La province demandée n\'existe pas');
        }
        
        // Check if the province is used before deleting it
        if ($state->nursery()->count() > 0) {
            return redirect()->route('states.index')->with('error', 'Impossible de supprimer cette province car elle est utilisée par une ou plusieurs garderies');
        }
        
        $state->delete();
        return redirect()->route('states.index')->with('success', 'Province supprimée avec succès');
    }

    public function clear()
    {
        // Only delete unused provinces
        $unusedStates = State::doesntHave('nursery')->get();
        foreach ($unusedStates as $state) {
            $state->delete();
        }
        
        return redirect()->route('states.index')->with('success', 'Provinces non utilisées supprimées avec succès');
    }
} 