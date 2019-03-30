<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        return Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'zip' => $request->input('zip'),
        ]);
    }
}
