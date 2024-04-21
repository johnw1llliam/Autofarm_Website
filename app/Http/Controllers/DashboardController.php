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

    public function addFood(Request $request) {
        $namaKandang = $request->input('NamaKandang');
        $totalPakan = $request->input('TotalPakan');
    
        $kandang = Kandang::where('NamaKandang', $namaKandang)->first();
        $kandang->TotalPakan += $totalPakan;
        $kandang->save();

        return redirect('/dashboard');
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

    public function addWater(Request $request) {
        $namaKandang = $request->input('NamaKandang');
        $totalAir = $request->input('TotalAir');
    
        $kandang = Kandang::where('NamaKandang', $namaKandang)->first();
        $kandang->TotalAir += $totalAir;
        $kandang->save();

        return redirect('/dashboard');
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

    public function addVaccine(Request $request) {
        $namaKandang = $request->input('NamaKandang');
        $totalVaksin = $request->input('TotalVaksin');
    
        $kandang = Kandang::where('NamaKandang', $namaKandang)->first();
        $kandang->TotalVaksin += $totalVaksin;
        $kandang->save();

        return redirect('/dashboard');
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
