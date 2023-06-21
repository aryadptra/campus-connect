<?php

namespace App\Http\Controllers\Admin;

use App\Models\UniversityRegisterSnm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\UniversityRegisterSchedules;


class UniversityRegisterSnmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $startDate = date('Y-m-d', strtotime($request->start_date));
        $endDate = date('Y-m-d', strtotime($request->end_date));

        $univId = $request->univ_id;

        // Ambil data university berdasarkan id
        $university = UniversityRegisterSnm::where('university_id', $univId)->first();

        if ($university == null) {
            // Validasi data yang diinputkan
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
            ]);

            UniversityRegisterSnm::create([
                'university_id' => $univId,
                'name' => 'SNMPTN',
                'description' => 'Pendaftaran SNMPTN',
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);

            // Redirect ke halaman detail university
            return redirect()->route('universities.show', $univId)->with('success', 'Jadwal pendaftaran berhasil ditambahkan');
        } else {
            $register = UniversityRegisterSnm::findOrFail($univId);

            $register->update([
                'name' => 'SNMPTN',
                'description' => 'Pendaftaran SNMPTN',
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);

            return redirect()->route('universities.show', $university->id)->with('success', 'Jadwal pendaftaran berhasil diupdate');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UniversityRegisterSnm  $universityRegisterSnm
     * @return \Illuminate\Http\Response
     */
    public function show(UniversityRegisterSnm $universityRegisterSnm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UniversityRegisterSnm  $universityRegisterSnm
     * @return \Illuminate\Http\Response
     */
    public function edit(UniversityRegisterSnm $universityRegisterSnm)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UniversityRegisterSnm  $universityRegisterSnm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UniversityRegisterSnm $universityRegisterSnm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UniversityRegisterSnm  $universityRegisterSnm
     * @return \Illuminate\Http\Response
     */
    public function destroy(UniversityRegisterSnm $universityRegisterSnm)
    {
        //
    }
}
