<?php

namespace App\Http\Controllers\Admin;

use App\Models\UniversityRegisterSbm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UniversityRegisterSbmController extends Controller
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
        $university = UniversityRegisterSbm::where('university_id', $univId)->first();

        if ($university == null) {
            // Validasi data yang diinputkan
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
            ]);

            UniversityRegisterSbm::create([
                'university_id' => $univId,
                'name' => 'SBMPTN',
                'description' => 'Pendaftaran SBMPTN',
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);

            // Redirect ke halaman detail university
            return redirect()->route('universities.show', $univId)->with('success', 'Jadwal pendaftaran berhasil ditambahkan');
        } else {
            $register = UniversityRegisterSbm::findOrFail($univId);

            $register->update([
                'name' => 'SBMPTN',
                'description' => 'Pendaftaran SBMPTN',
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);

            return redirect()->route('universities.show', $university->id)->with('success', 'Jadwal pendaftaran berhasil diupdate');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UniversityRegisterSbm  $universityRegisterSbm
     * @return \Illuminate\Http\Response
     */
    public function show(UniversityRegisterSbm $universityRegisterSbm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UniversityRegisterSbm  $universityRegisterSbm
     * @return \Illuminate\Http\Response
     */
    public function edit(UniversityRegisterSbm $universityRegisterSbm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UniversityRegisterSbm  $universityRegisterSbm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UniversityRegisterSbm $universityRegisterSbm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UniversityRegisterSbm  $universityRegisterSbm
     * @return \Illuminate\Http\Response
     */
    public function destroy(UniversityRegisterSbm $universityRegisterSbm)
    {
        //
    }
}
