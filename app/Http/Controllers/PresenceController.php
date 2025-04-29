<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presences;
use App\Models\Child;
use App\Models\Educators;
use App\Models\Nursery;
class PresenceController extends Controller
{
    public function index(Request $request){
        $name_nursery = $request->name_nursery;
        $nurseries=Nursery::all();    
        if($name_nursery){
           $nursery_id=Nursery::where('name', $name_nursery)->pluck('id')->first();
           $name_nursery=Nursery::where('name', $name_nursery)->pluck('name')->first();
        }else{
            $nursery_id = Nursery::first()?->id;
            $name_nursery=Nursery::first()?->name;
        }
        
        $presences=Presences::where('nursery_id', $nursery_id)->get();

        $children=Child::all();
        $educators=Educators::all();
      
        return view('Presence', [
            'presences' => $presences,
            'nurseries' => $nurseries,
            'children' => $children,
            'educators' => $educators,
            'nurseryName' => $name_nursery  
        ]);// ← il y a un espace et mauvais nom


    }
    public function add(Request $request){
      
        $child_id=Child::where('nom', $request->child_description)->pluck('id')->first();
        $nursery_id=Nursery::where('name', $request->nursery_name)->pluck('id')->first();
        $educator_id = Educators::where('LastName', $request->educator_description)->pluck('id')->first();
                Presences::create([
                    'dateTime' => $request->dateTime,
                    'child_id' => $child_id,
                    'educator_id' => $educator_id,
                    'nursery_id' => $nursery_id,
                ]);
            return redirect()->route('presence.index');
    }
    
    public function delete($id){
        // Vérifie si l'élément existe avant de supprimer
        $presenceFind = Presences::where('id_presence', $id)->first();
    
        if (!$presenceFind) {
            return redirect()->route('presence.index')->with('error', 'Le post demandé n\'existe pas');
        }
    
        // Supprime directement l'élément
        Presences::where('id_presence', $id)->delete(); 
    
        return redirect()->route('presence.index')->with('success', 'Présence supprimée avec succès');
    }
    
    public function clear(){
        Presences::truncate();
        return redirect()->route('presence.index');
    }
}
