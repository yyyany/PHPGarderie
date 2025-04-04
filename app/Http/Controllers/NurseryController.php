<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nursery;
use App\Models\State;
class NurseryController extends Controller
{
    public function index(){
        $nureries=Nursery::all();
        $states=State::all();
       return view('nursery', ['nurseries' => $nureries],['states' => $states]);
    }
    public function add(Request $request){
      
            // Récupérer le nom de l'état ou la description (selon le champ envoyé)
            $description_state = $request->state_name; // Récupère la description ou l'id de l'état selon ce qui est envoyé
            
            if ($description_state != null) {
                // Si c'est la description, tu peux récupérer l'ID correspondant à cette description
                $id_state = State::where('description', $description_state)->pluck('id')->first();
         
                // Créer un nouvel enregistrement Nursery avec l'ID de l'état
                Nursery::create([
                    'name' => $request->name,
                    'address' => $request->address,
                    'city' => $request->city,
                    'phone' => $request->phone,
                    'id_state' => $id_state,
                ]);
            }
        
            return redirect()->route('nursery.index');
        
        
    }
    public function formModifyNursery($id){
        $nurseryFind = Nursery::find($id);
        $states=State::all();
        if (!$nurseryFind) {
            return redirect()->route('nursery.index')->with('error', 'Le post demandé n\'existe pas');
        }
        return view('nurseryModify', ['nursery' => $nurseryFind],['states' => $states]);
    }
    public function update($id,Request $request){
        $nurseryFind = Nursery::find($id);
        $description_state = $request->state_name; // Récupère la description ou l'id de l'état selon ce qui est envoyé
        if ($description_state != null) {
            // Si c'est la description, tu peux récupérer l'ID correspondant à cettee description
            $id_state = State::where('description', $description_state)->pluck('id')->first();
    // ce qui est en request c'est les truc passé en id pas comme le applciationweb peut envoyer un objet complet comme dto
        $nurseryFind->update([
            'name' => $request->name,
            'address' => $request->address, 
            'city' => $request->city,
            'phone' => $request->phone,
            'id_state' => $id_state,
        ]);
         }
        return redirect()->route('nursery.index');
    }
    public function delete($id){
        $nurseryFind = Nursery::find($id);
        if (!$nurseryFind) {
            return redirect()->route('nursery.index')->with('error', 'Le post demandé n\'existe pas');
        }
        $nurseryFind->delete();
        return redirect()->route('nursery.index');
            
    }
    public function clear(){
        Nursery::truncate();
        return redirect()->route('nursery.index');
    }
}
