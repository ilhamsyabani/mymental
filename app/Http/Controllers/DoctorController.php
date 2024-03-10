<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('livewire.pages.doctor.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //dd($request);
         // Validate the incoming request data
         $data = $request->validate([
            'name' => 'required',
            'photo' => 'required',
            'cover' => 'required',
            'spesialis' => 'required',
            'deskripsi' => 'required',
            'pendidikan' => 'required',
            'pengalaman' => 'required',
            'SIPP' => 'required',
            'harga' => 'required',
        ]);

        $doctor->name =  $data['name'];
        $doctor->photo =  $data['photo'];
        $doctor->cover =  $data['cover'];
        $doctor->spesialis =  $data['spesialis'];
        $doctor->deskripsi =  $data['deskripsi'];
        $doctor->pendidikan =  $data['pendidikan'];
        $doctor->pengalaman =  $data['pengalaman'];
        $doctor->harga =  $data['harga'];
        $doctor->SIPP =  $data['SIPP'];

        $doctor->save();

        return redirect()->route('doctors-index')->with('status', 'Detail Doctor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
