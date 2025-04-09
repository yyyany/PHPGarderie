<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategorieDepense;

class CategorieDepenseController extends Controller
{
    public function index(){
        $categoriesDepense = CategorieDepense::all();
        return view('categorieDepense', ['categoriesDepense' => $categoriesDepense]);
    }
    
    public function add(Request $request){
        $description = $request->description;
        $pourcentage = $request->pourcentage;
        
        if ($description != null && $pourcentage != null) {
            CategorieDepense::create([
                'description' => $description,
                'pourcentage' => $pourcentage,
            ]);
        }
        
        return redirect()->route('categorieDepense.index');
    }
    
    public function formModifyCategorieDepense($id){
        $categorieDepense = CategorieDepense::find($id);
        
        if (!$categorieDepense) {
            return redirect()->route('categorieDepense.index')->with('error', 'La catégorie demandée n\'existe pas');
        }
        
        return view('categorieDepenseModify', ['categorieDepense' => $categorieDepense]);
    }
    
    public function update($id, Request $request){
        $categorieDepense = CategorieDepense::find($id);
        
        if (!$categorieDepense) {
            return redirect()->route('categorieDepense.index')->with('error', 'La catégorie demandée n\'existe pas');
        }
        
        if ($request->description != null && $request->pourcentage != null) {
            $categorieDepense->update([
                'description' => $request->description,
                'pourcentage' => $request->pourcentage,
            ]);
        }
        
        return redirect()->route('categorieDepense.index');
    }
    
    public function delete($id){
        $categorieDepense = CategorieDepense::find($id);
        
        if (!$categorieDepense) {
            return redirect()->route('categorieDepense.index')->with('error', 'La catégorie demandée n\'existe pas');
        }
        
        $categorieDepense->delete();
        
        return redirect()->route('categorieDepense.index');
    }
    
    public function clear(){
        CategorieDepense::truncate();
        return redirect()->route('categorieDepense.index');
    }
} 