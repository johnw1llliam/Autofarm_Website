<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandang;
use App\Models\Aktivitas;
use App\Models\Register;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->user()->id;

        $kandangs = Kandang::where('UserID', $userId)->get();
        $users = Register::where('UserID', $userId)->get();
        $aktivitases = Aktivitas::whereIn('KandangID', function ($query) use ($userId) {
            $query->select('KandangID')->from('Kandang')->where('UserID', $userId);
        })->get();

        return view('dashboard', [
            'kandangs' => $kandangs,
            'aktivitases' => $aktivitases,
            'users' => $users,
        ]);
    }

    public function apiKandang($id) {
        $kandangs = Kandang::where('UserID', $id)->get();

        if (request()->segment(1)=='api') return response()->json([
            'error' => false,
            'list' => $kandangs,
        ]);
    }

    public function apiAktivitas($id) {
        $aktivitases = Aktivitas::whereIn('KandangID', function ($query) use ($id) {
            $query->select('KandangID')->from('Kandang')->where('UserID', $id);
        })->get();

        if (request()->segment(1)=='api') return response()->json([
            'error' => false,
            'list' => $aktivitases,
        ]);
    }

    public function apiUser($id) {
        $users = Register::where('UserID', $id)->get();

        if (request()->segment(1)=='api') return response()->json([
            'error' => false,
            'list' => $users,
        ]);
    }

    public function addPoultry(Request $request) {
        $validatedData = $request->validate([
            'NamaKandang' => 'required|max:20|unique:kandang',
        ]);
        
        $kandang = new Kandang;
        $kandang->UserID = auth()->user()->id;
        $kandang->NamaKandang = $validatedData['NamaKandang'];
        $kandang->save();
        return redirect('/dashboard');
    }

    public function apiAddPoultry(Request $request, $id)
    {
        $validatedData = $request->validate([
            'namaKandang' => 'required|max:20|unique:kandang',
        ]);

        $kandang = new Kandang;
        $kandang->UserID = $id;
        $kandang->NamaKandang = $validatedData['namaKandang'];
        $kandang->save();

        return response()->json([
            'error' => false,
            'message' => 'Kandang added successfully',
            'data' => $kandang,
        ], 201); // 201 Created
    }

    public function addFood(Request $request, $id) {
        $namaKandang = $request->input('NamaKandang');
        $totalPakan = $request->input('TotalPakan');
    
        $kandang = Kandang::where('NamaKandang', $namaKandang)->first();
        $kandang->TotalPakan += $totalPakan;
        $kandang->save();

        return redirect('/dashboard');
    }

    public function apiAddFood(Request $request, $namaKandang)
    {
        $validatedData = $request->validate([
            'totalPakan' => 'required|numeric|min:0',
        ]);

        $kandang = Kandang::where('NamaKandang', $namaKandang)->firstOrFail();
        $kandang->TotalPakan += $validatedData['totalPakan'];
        $kandang->save();

        return response()->json([
            'error' => false,
            'message' => 'Food added successfully',
            'data' => $kandang,
        ]);
    }
    
    public function substractFood(Request $request) {
        $kandangID = $request->input('KandangID');
        $jumlahPakan = $request->input('JumlahPakan');
    
        $kandang = Kandang::where('KandangID', $kandangID)->first();
        $kandang->TotalPakan -= $jumlahPakan;
        $kandang->save();

        date_default_timezone_set('Asia/Jakarta');

        $aktivitas = new Aktivitas;
        $aktivitas->KandangID = $kandangID;
        $aktivitas->JumlahPakan = $jumlahPakan;
        $aktivitas->Waktu = date('Y-m-d H:i:s');
        $aktivitas->save();

        return redirect('/dashboard');
    }

    public function apiSubtractFood(Request $request, $namaKandang)
    {
        $validatedData = $request->validate([
            'jumlahPakan' => 'required|numeric|min:0',
        ]);

        $kandang = Kandang::where('NamaKandang', $namaKandang)->firstOrFail();
        $kandangID = $kandang->KandangID;
        $kandang->TotalPakan -= $validatedData['jumlahPakan'];
        $kandang->save();

        $aktivitas = new Aktivitas;
        $aktivitas->KandangID = $kandangID;
        $aktivitas->JumlahPakan = $validatedData['jumlahPakan'];
        $aktivitas->Waktu = now();
        $aktivitas->save();

        return response()->json([
            'error' => false,
            'message' => 'Food subtracted successfully',
            'data' => $kandang,
        ]);
    }

    public function addWater(Request $request) {
        $namaKandang = $request->input('NamaKandang');
        $totalAir = $request->input('TotalAir');
    
        $kandang = Kandang::where('NamaKandang', $namaKandang)->first();
        $kandang->TotalAir += $totalAir;
        $kandang->save();

        return redirect('/dashboard');
    }

    public function apiAddWater(Request $request, $namaKandang)
    {
        $validatedData = $request->validate([
            'totalAir' => 'required|numeric|min:0',
        ]);

        $kandang = Kandang::where('NamaKandang', $namaKandang)->firstOrFail();
        $kandang->TotalAir += $validatedData['totalAir'];
        $kandang->save();

        return response()->json([
            'error' => false,
            'message' => 'Water added successfully',
            'data' => $kandang,
        ]);
    }
    
    public function substractWater(Request $request) {
        $kandangID = $request->input('KandangID');
        $jumlahAir = $request->input('JumlahAir');
    
        $kandang = Kandang::where('KandangID', $kandangID)->first();
        $kandang->TotalAir -= $jumlahAir;
        $kandang->save();

        date_default_timezone_set('Asia/Jakarta');

        $aktivitas = new Aktivitas;
        $aktivitas->KandangID = $kandangID;
        $aktivitas->JumlahAir = $jumlahAir;
        $aktivitas->Waktu = date('Y-m-d H:i:s');
        $aktivitas->save();

        return redirect('/dashboard');
    }

    public function apiSubtractWater(Request $request, $namaKandang)
    {
        $validatedData = $request->validate([
            'jumlahAir' => 'required|numeric|min:0',
        ]);

        $kandang = Kandang::where('NamaKandang', $namaKandang)->firstOrFail();
        $kandangID = $kandang->KandangID;
        $kandang->TotalAir -= $validatedData['jumlahAir'];
        $kandang->save();

        $aktivitas = new Aktivitas;
        $aktivitas->KandangID = $kandangID;
        $aktivitas->JumlahAir = $validatedData['jumlahAir'];
        $aktivitas->Waktu = now();
        $aktivitas->save();

        return response()->json([
            'error' => false,
            'message' => 'Water subtracted successfully',
            'data' => $kandang,
        ]);
    }

    public function addVaccine(Request $request) {
        $namaKandang = $request->input('NamaKandang');
        $totalVaksin = $request->input('TotalVaksin');
    
        $kandang = Kandang::where('NamaKandang', $namaKandang)->first();
        $kandang->TotalVaksin += $totalVaksin;
        $kandang->save();

        return redirect('/dashboard');
    }

    public function apiAddVaccine(Request $request, $namaKandang)
    {
        $validatedData = $request->validate([
            'totalVaksin' => 'required|numeric|min:0',
        ]);

        $kandang = Kandang::where('NamaKandang', $namaKandang)->firstOrFail();
        $kandang->TotalVaksin += $validatedData['totalVaksin'];
        $kandang->save();

        return response()->json([
            'error' => false,
            'message' => 'Vaccine added successfully',
            'data' => $kandang,
        ]);
    }
    
    public function substractVaccine(Request $request) {
        $kandangID = $request->input('KandangID');
        $jumlahVaksin = $request->input('JumlahVaksin');
    
        $kandang = Kandang::where('KandangID', $kandangID)->first();
        $kandang->TotalVaksin -= $jumlahVaksin;
        $kandang->save();

        date_default_timezone_set('Asia/Jakarta');

        $aktivitas = new Aktivitas;
        $aktivitas->KandangID = $kandangID;
        $aktivitas->JumlahVaksin = $jumlahVaksin;
        $aktivitas->Waktu = date('Y-m-d H:i:s');
        $aktivitas->save();

        return redirect('/dashboard');
    }

    public function apiSubtractVaccine(Request $request, $namaKandang)
    {
        $validatedData = $request->validate([
            'jumlahVaksin' => 'required|numeric|min:0',
        ]);

        $kandang = Kandang::where('NamaKandang', $namaKandang)->firstOrFail();
        $kandangID = $kandang->KandangID;
        $kandang->TotalVaksin -= $validatedData['jumlahVaksin'];
        $kandang->save();

        $aktivitas = new Aktivitas;
        $aktivitas->KandangID = $kandangID;
        $aktivitas->JumlahVaksin = $validatedData['jumlahVaksin'];
        $aktivitas->Waktu = now();
        $aktivitas->save();

        return response()->json([
            'error' => false,
            'message' => 'Vaccine subtracted successfully',
            'data' => $kandang,
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
