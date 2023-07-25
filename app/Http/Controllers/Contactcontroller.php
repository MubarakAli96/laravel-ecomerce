<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Contactcontroller extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }
    public function store(Request $request)
    {
        $rules = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required'
        ]);

        $contact = Contact::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'subject'   => $request->subject,
            'message'   => $request->message,
            'phone_no'  => $request->phone_no,

        ]);

        if ($contact) {
            return redirect()->route('contact')->with('success', ' the Contact add successfully❤');
        } else {
            return redirect()->route('contact')->with('error', ' Sorry there is some error🤦‍♂️🤦‍♂️');
        }
    }
}
