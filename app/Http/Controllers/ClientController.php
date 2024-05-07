<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        // Retrieve dummy client data (you can use factories or seeders)
        $clients = Client::all();

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Create the client
        $client = Client::create([
            'name' => $validatedData['name'],
            'contact_person' => $validatedData['contact_person'],
            // Add more fields as needed
        ]);

        // Redirect to a relevant page with a success message
        return redirect()->route('clients.index')->with('success', 'Client created successfully!');
    }
}
