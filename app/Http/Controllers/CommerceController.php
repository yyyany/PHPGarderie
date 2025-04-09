<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commerce;
use App\Models\Expense;
class CommerceController extends Controller
{
    public function index(){
        $commerces=Commerce::all();
       return view('commerce', ['commerces' => $commerces]);
    }
    public function add(Request $request){
            $commerceName = $request->description;
            if ($commerceName != null) {
                Commerce::create([
                    'description' => $request->description,
                    'address' => $request->adress,
                    'phone' => $request->phone,
                ]);
            }
            return redirect()->route('commerce.index');
    }
    public function formModifyCommerce($id){
        $commerceFind = Commerce::find($id);
        if (!$commerceFind) {
            return redirect()->route('Commerce.index')->with('error', 'Le post demandé n\'existe pas');
        }
     
            $expenses = Expense::where('commerce_id', $commerceFind->id )->get();
        
        return view('commerceModify', ['commerce' => $commerceFind],['expenses' => $expenses]);
    }
    public function update($id,Request $request){
        $commerceFind = Commerce::find($id);
        if ($request->description != null) {
        $commerceFind->update([
            'description' => $request->description,
            'address' => $request->adress, 
            'phone' => $request->phone,
        ]);
         }
        return redirect()->route('commerce.index');
    }
    public function delete($id){
        $commerceFind = Commerce::find($id);
        if (!$commerceFind) {
            return redirect()->route('commerce.index')->with('error', 'Le post demandé n\'existe pas');
        }
        $commerceFind->delete();
        return redirect()->route('commerce.index');
            
    }
    public function clear(){
        Commerce::truncate();
        return redirect()->route('commerce.index');
    }
  
}
