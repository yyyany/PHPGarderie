<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nursery;
use App\Models\Presences;
use App\Models\Expense;
use App\Models\Educators;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $nurseries = Nursery::all();
        return view('report', [
            'nurseries' => $nurseries,
            'selectedNursery' => null,
            'presenceCount' => 0,
            'educatorPresenceCount' => 0,
            'expenses' => 0,
            'revenues' => 0,
            'salaries' => 0,
            'profit' => 0
        ]);
    }

    public function generate(Request $request)
    {
        $nurseries = Nursery::all();
        $selectedNursery = Nursery::find($request->nursery_id);
        
        if (!$selectedNursery) {
            return redirect()->route('rapport.index')->with('error', 'Veuillez sélectionner une garderie valide');
        }
        
        // Calculate the total number of children attendances
        $presenceCount = Presences::where('nursery_id', $selectedNursery->id)->count();
        
        // Calculate the total number of educator attendances
        $educatorPresenceCount = Presences::where('nursery_id', $selectedNursery->id)
            ->whereNotNull('educator_id')
            ->count();
        
        // Calculate total expenses
        $expenses = Expense::where('nursery_id', $selectedNursery->id)->sum('amount');
        
        // Calculate revenues (48$ per attendance)
        $pricePerPresence = 48;
        $revenues = $presenceCount * $pricePerPresence;
        
        // Calculate salaries (8h × 18$/hour × number of educator attendances)
        $hourlyRate = 18;
        $hoursPerDay = 8;
        $salaries = $educatorPresenceCount * $hoursPerDay * $hourlyRate;
        
        // Calculate profit
        $profit = $revenues - ($expenses + $salaries);
        
        return view('report', [
            'nurseries' => $nurseries,
            'selectedNursery' => $selectedNursery,
            'presenceCount' => $presenceCount,
            'educatorPresenceCount' => $educatorPresenceCount,
            'expenses' => $expenses,
            'revenues' => $revenues,
            'salaries' => $salaries,
            'profit' => $profit
        ]);
    }
} 