<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        $spps = Spp::all(); // Fetching all SPP data
        return view('pages.data-spp.index', compact('spps')); // Returning the view with the SPP data
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'amount' => 'required|numeric', // Ensure amount is required and numeric
            'description' => 'nullable|string|max:255', // Description is optional, with a max length of 255
        ]);

        // Create a new SPP record
        Spp::create($request->all());

        // Redirect back to the index page with a success message
        return redirect()->route('data-spp.index')->with('success', 'Data SPP berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'amount' => 'required|numeric', // Ensure amount is required and numeric
            'description' => 'nullable|string|max:255', // Description is optional, with a max length of 255
        ]);

        // Find the SPP record by ID and update it
        $spp = Spp::findOrFail($id);
        $spp->update($request->all());

        // Redirect back to the index page with a success message
        return redirect()->route('data-spp.index')->with('success', 'Data SPP berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Find the SPP record by ID and delete it
        $spp = Spp::findOrFail($id);
        $spp->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('data-spp.index')->with('success', 'Data SPP berhasil dihapus!');
    }
}
