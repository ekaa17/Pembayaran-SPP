<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Spp;
use App\Models\Staff;
use App\Models\Student;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['student', 'spp', 'staff'])->get(); // Fetch all payments with related models
        $students = Student::all();  // Assuming the students are fetched from the Student model
        $spps = Spp::all();          // Fetching SPP data
        $staffs = Staff::all();  
        return view('pages.data-payments.index', compact('payments','students','spps','staffs'));
    }

    public function create()
    {
        $students = Student::all(); // Get all students
        $spps = Spp::all(); // Get all SPP records
        $staffs = Staff::all(); // Get all staff records
        return view('pages.data-payments.create', compact('students', 'spps', 'staffs'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'spp_id' => 'required|exists:spps,id',
            'payment_date' => 'required|date',
            'amount_paid' => 'required|numeric',
            'staff_id' => 'required|exists:staff,id', // Make sure this is validated
        ]);
    
        Payment::create($request->all()); // Store the payment record
    
        return redirect()->route('data-payments.index')->with('success', 'Payment successfully added!');
    }

    public function edit(Payment $payment)
    {
        $students = Student::all();
        $spps = Spp::all();
        $staffs = Staff::all();
        return view('pages.data-payments.edit', compact('payment', 'students', 'spps', 'staffs'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'spp_id' => 'required|exists:spps,id',
            'payment_date' => 'required|date',
            'amount_paid' => 'required|numeric',
            'staff_id' => 'required|exists:staff,id',
        ]);

        $payment->update($request->all()); // Update the payment record

        return redirect()->route('data-payments.index')->with('success', 'Payment successfully updated!');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete(); // Delete the payment record

        return redirect()->route('data-payments.index')->with('success', 'Payment successfully deleted!');
    }
}
