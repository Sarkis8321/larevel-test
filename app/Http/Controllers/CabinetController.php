<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabinet;

class CabinetController extends Controller
{
    public function index()
    {
        return view('cabinets');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'teacher' => 'required',
        ]);
        $cabinet = new Cabinet();
        $cabinet->name = $request->name;
        $cabinet->teacher = $request->teacher;
        $cabinet->save();
        return response()->json(['message' => 'Кабинет успешно добавлен']);
    }
    public function getCabinets()
    {
        $cabinets = Cabinet::all();
        return response()->json(['cabinets' => $cabinets]);
    }
}
