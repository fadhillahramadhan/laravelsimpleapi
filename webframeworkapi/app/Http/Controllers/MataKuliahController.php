<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliahs = MataKuliah::with('jurusan')->get();
        return response()->json($mataKuliahs);
    }

    public function informatika()
    {
        $jurusans = MataKuliah::where('jurusan_id', '541')->get();
        return response()->json($jurusans);
    }

    public function semester($semester)
    {
        $mataKuliahs = MataKuliah::where('semester', $semester)->get();
        return response()->json($mataKuliahs);
    }

    public function teori_or_praktikum($type = 'teori')
    {
        // start with PRAK is praktikum and another is teori
        if ($type == 'teori') {
            $mataKuliahs = MataKuliah::where('mata_kuliah', 'not like', 'PRAK%')->get();
        } else {
            $mataKuliahs = MataKuliah::where('mata_kuliah', 'like', 'PRAK%')->get();
        }

        // get last query

        return response()->json($mataKuliahs);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mata_kuliah' => 'required|string|max:255',
            'sks' => 'required|integer',
            'jurusan_id' => 'required|exists:jurusans,id',
            'semester' => 'required|integer',
            'kode' => 'required|string|max:255',
        ]);

        $mataKuliah = MataKuliah::create($request->all());

        return response()->json([
            'message' => 'Mata Kuliah created successfully',
            'data' => $mataKuliah,
        ], 201);
    }

    public function show($id)
    {
        $mataKuliah = MataKuliah::with('jurusan')->findOrFail($id);
        return response()->json($mataKuliah);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mata_kuliah' => 'required|string|max:255',
            'sks' => 'required|integer',
            'jurusan_id' => 'required|exists:jurusans,id',
            'semester' => 'required|integer',
            'kode' => 'required|string|max:255',
        ]);

        $mataKuliah = MataKuliah::findOrFail($id);
        $mataKuliah->update($request->all());

        return response()->json([
            'message' => 'Mata Kuliah updated successfully',
            'data' => $mataKuliah,
        ]);
    }

    public function destroy($id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        $mataKuliah->delete();

        return response()->json([
            'message' => 'Mata Kuliah deleted successfully',
        ]);
    }
}
