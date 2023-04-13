<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Contact $contact)
    {
        $contact = Session()->get('contact');
        return view('index', compact('contact'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        return view('confirm', compact('contact'));
    }

    public function edit()
    {
        return redirect('/')->withInput();
    }

    public function store(Request $request)
    {
        $request->merge(['fullname']);
        $contact = $request->only(['fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        Contact::create($contact);
        return view('thanks');
    }

    public function search(Request $request)
    {
        $contacts = Contact::select()
            ->FullnameSearch($request->fullname)
            ->GenderSearch($request->gender)
            ->Created_atSearch($request->created_at)
            ->EmailSearch($request->email)
            ->paginate(10);
        return view('administration', compact('contacts'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/administrations');
    }
}
