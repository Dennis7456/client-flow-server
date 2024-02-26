<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        return Client::all();
    }

    public function store(Request $request)
    {

    $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'string', 'max:255'],
            'marital_status' => ['required', 'string', 'in:Married, Single, Divorced'],
            'approval_status' => ['required', 'string', 'in:Pending, Processing, Approved'],
            'created_by' => ['integer', 'exists:users,id'],
            'updated_by' => ['integer', 'exists:users,id'],
        ]);

    $client = Client::create([
         'name' => $request->name,
        'dob' => $request->dob,
        'marital_status' => $request->marital_status,
        'approval_status' => $request->approval_status,
        'created_by' => auth()->user()->id,
        'updated_by' => auth()->user()->id,
    ]);

    return response(['user' => auth()->user(), 'client' => $client]);

    }

    public function show($id)
    {
        return Client::find($id);
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        
        $client->update($request->all());

        return response(['user' => auth()->user(), 'client' => $client]);

    }

    public function destroy($id)
    {
        return Client::destroy($id);
    }

    public function search($name)
    {
        return Client::where('name', 'like', '%'.$name)->get();
    }
}
