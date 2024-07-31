<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Priority;

class PriorityController extends Controller
{
    public function index(){

        $priorities = Priority::all();
        return response()->json([
            'message' => 'Priorities have been Successfully Retrieved.',
            'priorities' => $priorities
        ]);
    
    }

    public function store(Request $request){

        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $priority = Priority::create($validated);

        return response()->json([
            'message' => 'Priority Created Successfully.',
            'priority' => $priority
        ], 201);
    }

    public function show($id){

        $priority = Priority::findOrFail($id);
        return response()->json([
            'message' => 'Priority have been Successfully Retrieved.',
        ], 200);
    }
    
    public function update(Request $request, $id){

        $priority = Priority::findOrFail($id);
    
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);
    
        $priority->update($validated);
    
        return response()->json([
            'message' => 'Priority have been Successfully Updated.',
            'priority' => $priority
        ], 200);
    }
    
    public function destroy($id){

        $priority = Priority::findOrFail($id);
        $priority->delete();

        return response()->json([
            'message' => 'Priority has been Successfully Deleted'
        ]);
    }

}


