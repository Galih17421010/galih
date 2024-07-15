<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socialLinks = SocialLink::all();
        return view('backend.pages.socialLinks.index', compact('socialLinks'));
    }

    public function create()
    {
        return view('backend.pages.socialLinks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required',
            'url' => 'required|url',
        ]);

        SocialLink::create($request->all());

        return redirect()->route('backend.pages.socialLinks.index')
                         ->with('success', 'Social link created successfully.');
    }

    public function show(SocialLink $socialLink)
    {
        return view('backend.pages.socialLinks.show', compact('socialLink'));
    }

    public function edit(SocialLink $socialLink)
    {
        return view('backend.pages.socialLinks.edit', compact('socialLink'));
    }

    public function update(Request $request, SocialLink $socialLink)
    {
        $request->validate([
            'platform' => 'required',
            'url' => 'required|url',
        ]);

        $socialLink->update($request->all());

        return redirect()->route('backend.pages.socialLinks.index')
                         ->with('success', 'Social link updated successfully.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();

        return redirect()->route('backend.pages.socialLinks.index')
                         ->with('success', 'Social link deleted successfully.');
    }
}
