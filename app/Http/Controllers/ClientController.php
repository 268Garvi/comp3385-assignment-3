<?php

// app/Http/Controllers/ClientController.php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Routing\Redirector;

class ClientController extends Controller
{
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('clients/add');
    }

    public function store(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'company_logo' => 'required|mimes:png,jpg,webp,svg,jpeg|max:12288',
        ]);

        // Upload the logo
        $logoPath = $request->file('company_logo');
        $logoPath->storeAs('images', $logoPath->getClientOriginalName(), 'public');


        // Save the client information to the database
        Client::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'telephone' => $validatedData['telephone'],
            'address' => $validatedData['address'],
            'company_logo' => $logoPath->getClientOriginalName(),
        ]);


        return redirect('/dashboard')->with('success', 'Client added successfully!');
    }


}
