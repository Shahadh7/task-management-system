<?php

namespace App\Http\Controllers;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return response()->json([
            'message' => 'Statuses retrieved successfully',
            'data' => $statuses
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        $status = Status::create($request->all());
        return response()->json([
            'message' => 'Status created successfully',
            'data' => $status
        ], 201);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        $status = Status::findOrfail($id);
        $status->update($request->all());
        return response()->json([
            'message' => 'Status updated successfully',
            'data' => $status
        ]);
    }

    public function destroy($id)
    {
        $status = Status::findOrfail($id);
        $status->delete();
        return response()->json([
            'message' => 'Status deleted successfully'
        ]);
    }

}
