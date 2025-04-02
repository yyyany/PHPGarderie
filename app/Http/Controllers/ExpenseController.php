<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Nursery;
use App\Models\State;
use App\Models\Expense;
use App\Models\Commerce;
use App\Models\CategorieDepense;

class ExpenseController extends Controller
{
    public function index(Request $request){
        $nursery_description=$request->state_name;
        $nursery_id =Nursery::where('name', $nursery_description)->pluck('id')->first();
        $expenses = $nursery_id 
            ? Expense::where('nursery_id', $nursery_id)->get() 
            : Expense::all();
            
        $nurseries = Nursery::all();
        $commerces = Commerce::all();
        $categoriesExpenses = CategorieDepense::all();
        return view('expense', [
            'expenses' => $expenses,
            'nurseries' => $nurseries,
            'commerces' => $commerces,
            'categoriesExpenses' => $categoriesExpenses,
            'nurseryName' => $nursery_description
        ]);
    }
    
    public function add(Request $request){
        // Récupérer les données du formulaire
        $amount = $request->amount;
        $category_name = $request->category_name;
        $expense_commerce_name = $request->expense_commerce_name;
        $nursery_name= $request->nursery_name;
        
        if ($category_name && $expense_commerce_name && $nursery_name) {
            // Récupérer les IDs à partir des descriptions
            $commerce_id = Commerce::where('description', $expense_commerce_name)->value('id');
            $category_id = CategorieDepense::where('description', $category_name)->value('id');
            $nursery_id=Nursery::where('name', $nursery_name)->pluck('id')->first();
            // Créer la dépense
            Expense::create([
                'dateTime' => now(),
                'amount' => $amount,
                'nursery_id' => $nursery_id,
                'commerce_id' => $commerce_id,
                'category_expense_id' => $category_id,
            ]);
        }
        
        return redirect()->route('expense.index', ['nursery_id' => $nursery_id]);
    }
    
    public function formModifyExpense($id){
        $expense = Expense::find($id);
        
        if (!$expense) {
            return redirect()->route('expense.index')->with('error', 'La dépense demandée n\'existe pas');
        }
        
        $nurseries = Nursery::all();
        $commerces = Commerce::all();
        $categoriesExpenses = CategorieDepense::all();
        
        return view('expenseModify', [
            'expense' => $expense,
            'nurseries' => $nurseries,
            'commerces' => $commerces,
            'categoriesExpenses' => $categoriesExpenses
        ]);
    }
    
    public function update($id, Request $request){
        $expense = Expense::find($id);
        
        if (!$expense) {
            return redirect()->route('expense.index')->with('error', 'La dépense demandée n\'existe pas');
        }
        $category_name = $request->category_name;
        $expense_commerce_name = $request->expense_commerce_name;
        $nursery_id = $request->nursery_id;
        if ($category_name && $expense_commerce_name) {
            // Récupérer les IDs à partir des descriptions
            $commerce_id = Commerce::where('description', $expense_commerce_name)->value('id');
            $category_id = CategorieDepense::where('description', $category_name)->value('id');
            // Mettre à jour la dépense
            $expense->update([
                'dateTime' => $request->dateTime ?? $expense->dateTime,
                'amount' => $request->amount,
                'nursery_id' => $nursery_id,
                'commerce_id' => $commerce_id,
                'category_expense_id' => $category_id,
            ]);
        }
        
        return redirect()->route('expense.index', ['nursery_id' => $nursery_id]);
    }
    
    public function delete($id){
        $expense = Expense::find($id);
        
        if (!$expense) {
            return redirect()->route('expense.index')->with('error', 'La dépense demandée n\'existe pas');
        }
        
        $nursery_id = $expense->nursery_id;
        $expense->delete();
        
        return redirect()->route('expense.index', ['nursery_id' => $nursery_id]);
    }
    
    public function clear(){
        Expense::truncate();
        return redirect()->route('expense.index');
    }
}