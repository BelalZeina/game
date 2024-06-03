<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Contact::all();
        // return $admins;
        return view("dashboard.contacts.index", compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        // return $data ;
        return false;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'msg' => 'required|string',
        ]);


        Contact::create($request->all());
        Session::flash('success_message', ('login in successfully'));
        // If there are errors
        // toastr()->error('Failed to send message. Please check your inputs.');

        return redirect()->back(); // Or any redirect URL you prefer
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("dashboard.contacts.show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return back();
    }
}
