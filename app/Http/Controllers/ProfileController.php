<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->user()->id;

        $user = Register::where('UserID', $userId)->get();

        return view('profile', [
            'user' => $user,
        ]);
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
        $validatedData = $request->validate([
            'Name' => 'required|max:8',
            'Biodata' => 'required|max:50',
        ]);

        $userId = auth()->user()->id;
        $updatedUser = Register::where('UserID', $userId)->first();

        $updatedUser->Name = $validatedData["Name"];
        $updatedUser->Biodata = $validatedData["Biodata"];
        $updatedUser->save();

        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
