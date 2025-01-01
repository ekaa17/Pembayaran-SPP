<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Payment;
use App\Models\Spp;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function dashboard() {
        $total_karyawan = Staff::count();
        $total_kelas = Kelas::count();
        $total_student = Student::count();
        $total_spp = Spp::count();
        $total_payment = Payment::count();
        return view('pages.dashboard', compact('total_karyawan', 'total_kelas', 'total_student', 'total_spp','total_payment'));
    }

    
    public function login(Request $request) {
        // dd($request);
        $request->validate([
            'email' => 'required',
            'password'=> 'required' 
         ], [
            'email.required' => 'Kolom Email tidak boleh kosong.',
            'password.required' => 'Kolom Password tidak boleh kosong.',
        ]);


         if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            
            if ($user->role === 'Admin' || $user->role === 'Karyawan') {
                return redirect('/dashboard');
            } else {
                return redirect('/')->with('wrong', 'Role tidak Ditemukan !');
            }
        } else {
            return redirect('/')->with('wrong', 'Email dan password tidak tersedia');
        }
    }

    public function logout() {
        if (Auth::check()) {
            $role = Auth::user()->role;
    
           if ($role === 'Admin' || $role === 'Karyawan') {
                Auth::logout();
            }
        } 
        return redirect('/');
    }
}
