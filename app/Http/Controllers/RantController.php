<?php

namespace App\Http\Controllers;

use App\Models\Rant;
use App\Http\Requests\StoreRantRequest;
use App\Http\Requests\UpdateRantRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rants = Rant::latest()->get();


        return view('rants.index', ['rants' => $rants]);
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
        $data = $request->validate([
            'content' => 'required|string',
        ]);

        Auth::user()->rants()->create($data);

        return redirect()->route('rants.index')->with([
            'success' => 'Rant away! Your post is up.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rant $rant)
    {
        // dd($rant);

        return view('rants.show', ['rant' => $rant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rant $rant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRantRequest $request, Rant $rant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rant $rant)
    {
        //
    }
}