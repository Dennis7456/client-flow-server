<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
     public function index()
    {
        return ContactUs::all();
    }

    public function store (Request $request)
    {
        try {
            $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact_us = ContactUs::create($request->all());


        return response()->json(['message' => 'Contact us form submitted successfully!', 'contact_us' => $contact_us]);
    } catch(ValidationException $e) {
        return response()->json(['errors' => $e->validator->errors()], 422);
    } catch(QueryException $e) {
        return response()->json(['errors' => $e, 'message' => 'Database error occured'], 500);
    } catch(\Exception $e) {
        return response()->json(['errors' => $e, 'message' => 'Unexpected error occured'], 500);
    }
    }
}
