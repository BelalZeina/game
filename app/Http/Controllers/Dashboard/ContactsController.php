<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactsController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:contact_us-read')->only(['index']);
        $this->middleware('permission:contact_us-delete')->only(['destroy']);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Contact::all();
        return view("dashboard.contacts.index", compact('data'));
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("dashboard.contacts.show");
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

    public function deleteSelected(Request $request)
    {
        $ids = $request->ids;
        // return response()->json(['success' => true ,"ids"=> $ids]);
        foreach ($ids as $id) {
            $contact = Contact::find($id);
            if ($contact) {
                $contact->delete();
            }
        }
        return response()->json(['success' => true]);
    }
}
