<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::all();
        return view('listings.index', compact('listings'));
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        Listing::create($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|nullable',
            'price' => 'required',

        ]));

        return redirect()->route('listing.index');
    }

    public function show(Listing $listing)
    {
        return view('listings.show', compact('listing'));
    }

    public function edit(Listing $listing)
    {
        return view('listings.edit', compact('listing'));
    }

    public function update(Request $request, Listing $listing)
    {
        $listing->update($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|nullable',
            'price' => 'required',
            'is_active' => 'boolean',
        ]));

        return redirect()->route('listing.index');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->route('listing.index');
    }
}
