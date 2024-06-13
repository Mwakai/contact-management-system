<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        $groups = Group::all();
        
        return Inertia::render('Dashboard', compact('contacts', 'groups'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:contacts,name',
            'email' => 'sometimes|unique:contacts,email',
            'phone' => 'sometimes|unique:contacts,phone',
            'address' => 'sometimes',
            'group_id' => 'nullable|exists:groups,id'
        ]);

        Contact::create($request->all());

        return redirect()->route("dashboard");
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|unique:contacts,name,' . $contact->id,
            'email' => 'sometimes|unique:contacts,email,' . $contact->id,
            'phone' => 'sometimes|unique:contacts,phone,' . $contact->id,
            'address' => 'sometimes',
            'group_id' => 'nullable|exists:groups,id'
        ]);

        $contact->update($request->all());

        return redirect()->route("dashboard");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route("dashboard");
    }

}
