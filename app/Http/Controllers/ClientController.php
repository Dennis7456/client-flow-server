<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return json_decode($clients, true);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'string', 'max:255'],
            'marital_status' => ['required', 'string', 'in:Married, Single, Divorced'],
            'approval_status' => ['required', 'string', 'in:Pending, Processing, Approved'],
            'created_by' => ['required', 'integer', 'exists:users,id'],
            'updated_by' => ['required', 'integer', 'exists:users,id'],
            'created_on' => ['required', 'string'],
            'updated_on' => ['required', 'string']
        ]);

        $client = Client::create([
            'name' => $request->name,
            'dob' => $request->dob,
            'marital_status' => $request->marital_status,
            'approval_status' => $request->approval_status,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by,
            'created_on'=> $request->created_on,
            'updated_on' => $request->updated_on,
        ]);

        return redirect(RouteServiceProvider::HOME);
    }

    public function show(Request $request): RedirectResponse
    {
        
    }
    public function patch(Request $request): RedirectResponse
    {
        
    }
    public function delete(Request $request): RedirectResponse
    {
        
    }
}
