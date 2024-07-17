<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        return response()->json($jurusans);
    }




    public function store(Request $request)
    {
        $request->validate([
            'jurusan' => 'required|string|max:255',
            'singkat' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
        ]);

        $jurusan = Jurusan::create($request->all());

        return response()->json([
            'message' => 'Jurusan created successfully',
            'data' => $jurusan,
        ], 201);
    }

    public function show($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return response()->json($jurusan);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jurusan' => 'required|string|max:255',
            'singkat' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($request->all());

        return response()->json([
            'message' => 'Jurusan updated successfully',
            'data' => $jurusan,
        ]);
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();

        return response()->json([
            'message' => 'Jurusan deleted successfully',
        ]);
    }
}
