<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Priority;

class PriorityController extends Controller
{
    public function index(){

        $priorities = Priority::all();
        return response()->json($priorities);
    
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $priority = Priority::create($validated);

        return response()->json($priority, 201);
    }

    public function show($id){

        $priority = Priority::findOrFail($id);
        return response()->json($priority);
    }
    
    public function update(Request $request, $id){

        $priority = Priority::findOrFail($id);
    
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);
    
        $priority->update($validated);
    
        return response()->json($priority);
    }
    
    public function destroy($id){

        $priority = Priority::findOrFail($id);
        $priority->delete();

        return response()->json(['message' => 'Priority deleted']);
    }

}
