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
    public function index(){
        $expenses=Expense::all();
        $nurseries=Nursery::all();
        $commerces=Commerce::all();
        $categoriesExpenses=CategorieDepense::all();
       return view('expense', ['expenses' => $expenses],['nurseries' => $nurseries],['commerces' => $commerces],['categoriesExpenses' => $categoriesExpenses]);
    }
    public function add(Request $request){
     
            $category_expense_description = $request->category_name;
            $expense_commerce_description = $request->expense_commerce_name;
            $nursery_name = $request->nursery_description_name;
            if ($category_expense_description != null) {
                $id_Commerce = Commerce::where('description', $category_expense_description)->pluck('id')->first();
                $id_ExpenseCategory = CategorieDepense::where('description', $expense_commerce_description)->pluck('id')->first();
                $id_nursery = Nursery::where('name', $nursery_name)->pluck('id')->first();
                Expense::create([
                    'dateTime' => $request->name,
                    'amount' => $request->address,
                    'nursery_id' => $id_nursery,
                    'commerce_id' => $id_Commerce,
                    'category_expense_id' => $id_ExpenseCategory,
                ]);
            }
            return redirect()->route('expense.index');
          
    }
    public function formModify($id){
        $expenseFind= Expense::find($id);
        $commerces=Commerce::all();
        $categoriesExpenses=CategorieDepense::all();
        if (!$expenseFind) {
            return redirect()->route('expense.index')->with('error', 'Le post demandé n\'existe pas');
        }
        return view('expenseModify', ['expenseFind' => $expenseFind],['commerces' => $commerces],['commerces' => $commerces],['categoriesExpenses' => $categoriesExpenses]);
    }
    public function update($id,Request $request){
        $expenseFind = Expense::find($id);
        $category_expense_description = $request->category_name;
        $expense_commerce_description = $request->expense_commerce_name;
        $nursery_name = $request->nursery_description_name;
        if ($category_expense_description != null) {
            $id_Commerce = Commerce::where('description', $category_expense_description)->pluck('id')->first();
            $id_ExpenseCategory = CategorieDepense::where('description', $expense_commerce_description)->pluck('id')->first();
            $id_nursery = Nursery::where('name', $nursery_name)->pluck('id')->first();
        $expenseFind->update([
            'dateTime' => $request->name,
            'amount' => $request->address,
            'nursery_id' => $id_nursery,
            'commerce_id' => $id_Commerce,
            'category_expense_id' => $id_ExpenseCategory,
        ]);
         }
        return redirect()->route('expense.index');
    }
    public function delete($id){
        $expenseFind = Expense::find($id);
        if (!$expenseFind) {
            return redirect()->route('expense.index')->with('error', 'Le post demandé n\'existe pas');
        }
        $expenseFind->delete();
        return redirect()->route('expense.index');
           
    }
    public function clear(){
        Expense::truncate();
        return redirect()->route('expense.index');
    }
}