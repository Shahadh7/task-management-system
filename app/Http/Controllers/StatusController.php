<?php

namespace App\Http\Controllers;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $status = Status::all();
        return response()->json($status);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        $status = Status::create($request->all());
        return response()->json($status,201);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        $status = Status::findOrfile($id);
        $status->update($request->all());
        return response()->json($status);
    }

    public function destroy($id)
    {
        $status = Status::findOrfile($id);
        $status->delete();
        return response()->json(null,204);
    }

}
