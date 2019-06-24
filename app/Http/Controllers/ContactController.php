<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('contact');
    }

    public function add(ContactRequest $request)
    {
        $contact = Contact::create([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'message' => $request->get('message')
        ]);

        if (!$contact){
            return redirect()->back();
        }

        $request->session()->flash('flash_message', 'Message saved');
        return redirect()->route('contact');
    }
}
