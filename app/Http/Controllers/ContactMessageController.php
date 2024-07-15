<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $contactMessages = ContactMessage::all();
        return view('backend.pages.contactMessages.index', compact('contactMessages'));
    }

    public function create()
    {
        return view('backend.pages.contactMessages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        ContactMessage::create($request->all());

        return redirect()->route('backend.pages.contactMessages.index')
                         ->with('success', 'Contact message sent successfully.');
    }

    public function show(ContactMessage $contactMessage)
    {
        return view('backend.pages.contactMessages.show', compact('contactMessage'));
    }

    public function edit(ContactMessage $contactMessage)
    {
        return view('backend.pages.contactMessages.edit', compact('contactMessage'));
    }

    public function update(Request $request, ContactMessage $contactMessage)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contactMessage->update($request->all());

        return redirect()->route('backend.pages.contactMessages.index')
                         ->with('success', 'Contact message updated successfully.');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()->route('backend.pages.contactMessages.index')
                         ->with('success', 'Contact message deleted successfully.');
    }
}
