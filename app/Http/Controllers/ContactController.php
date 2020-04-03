<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * Show contact form.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('landing.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $contact = $request->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email:rfc,dns'],
            'message' => ['required', 'max:2000'],
        ]);

        try {
            $contact = new Contact($contact);
            $contact->save();

            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Message successfully sent, we will get in touch soon'
            ]);
        } catch (QueryException $ex) {
            return redirect()->back()->withInput()->with([
                'status' => 'danger',
                'message' => 'Something went wrong'
            ]);
        }
    }
}
