<?php

namespace App\Http\Controllers;

use App\Models\Kandang;
use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register.index');
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
            'Name' => 'required|max:20',
            'Username' => 'required|max:20',
            'Password' => 'required|min:5',
            'Email' => 'required|email:dns|unique:user',
            'NamaKandang' => 'required|max:20'
        ]);

        $validatedData['Password'] = bcrypt($validatedData['Password']);

        $user = new Register;
        $user->Name = $validatedData['Name'];
        $user->Username = $validatedData['Username'];
        $user->Password = $validatedData['Password'];
        $user->Email = $validatedData['Email'];
        $user->save();

        $users = new User;
        $users->name = $validatedData['Name'];
        $users->password = $validatedData['Password'];
        $users->email = $validatedData['Email'];
        $users->save();

        $kandang = new Kandang;
        $kandang->UserID = $user->UserID;
        $kandang->NamaKandang = $validatedData['NamaKandang'];
        $kandang->save();

        return redirect('/login')->with('success', 'Registration Success!');
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
    public function update(Request $request, string $id)
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
