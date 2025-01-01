<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Mengambil data siswa beserta relasi kelas
        $students = Student::with('kelas')->get();
        $kelas = Kelas::all(); // Ambil semua data kelas untuk dropdown
        return view('pages.data-student.index', compact('students', 'kelas'));
    }

    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'nis' => 'required|unique:students,nis|max:20',
            'name' => 'required|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'birth_date' => 'required|date',
        ]);

        // Membuat data siswa baru
        Student::create($request->all());

        return redirect()->route('data-student.index')->with('success', 'Data Student berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // Validasi input data update
        $request->validate([
            'nis' => 'required|max:20|unique:students,nis,' . $id,  // Memastikan nis unik kecuali untuk siswa yang sedang diupdate
            'name' => 'required|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'birth_date' => 'required|date',
        ]);

        // Menemukan data siswa berdasarkan ID dan update
        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('data-student.index')->with('success', 'Data Student berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Menghapus data siswa berdasarkan ID
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('data-student.index')->with('success', 'Data Student berhasil dihapus!');
    }
}
