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

    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->all());

        return $contact;
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return $this->respondSuccess(null);
    }


    protected function respondSuccess($data, $statusCode = 200, $headers = [])
    {
        return response()->json($data, $statusCode, $headers);
    }
}
