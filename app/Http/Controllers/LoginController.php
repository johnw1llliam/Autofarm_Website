<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function autentikasi(Request $request) {
        $authData = $request->validate([
            'Email' => 'required|email:dns',
            'Password' => 'required'
        ]);

        try {
            if (Auth::attempt([
                'email' => $authData['Email'],
                'password' => $authData['Password'],
            ])) {
                return redirect()->intended('/dashboard');
            }
            return redirect('/login')->with('loginError', 'Login Failed');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function apiLogin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ])) {
            return response()->json([
                'login' => true,
                'message' => 'Login successful',
                'userID' => auth()->user()->id,
            ]);
        } else {
            return response()->json([
                'login' => false,
                'message' => 'Invalid credentials',
            ]);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

    public function apiLogout(Request $request)
    {
        Auth::logout();
        return response()->json([
            'logout' => true,
            'message' => 'Logout successful',
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
        //
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
