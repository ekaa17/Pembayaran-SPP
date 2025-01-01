<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('pages.data-kelas.index', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|max:50',
            'grade' => 'required|max:10',
        ]);

        Kelas::create($request->all());

        return redirect()->route('data-kelas.index')->with('success', 'Data kelas berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'class_name' => 'required|max:50',
            'grade' => 'required|max:10',
        ]);

        $class = Kelas::findOrFail($id);
        $class->update($request->all());

        return redirect()->route('data-kelas.index')->with('success', 'Data kelas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $class = Kelas::findOrFail($id);
        $class->delete();

        return redirect()->route('data-kelas.index')->with('success', 'Data kelas berhasil dihapus!');
    }
}
