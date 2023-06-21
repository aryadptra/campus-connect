<?php

namespace App\Http\Controllers;

use App\Models\UniversityRegisterSnm;
use Illuminate\Http\Request;

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
        $univId = $request->univId;

        // Cek di database apakah sudah ada data dengan univId yang sama
        $univ = UniversityRegisterSnm::where('univId', $univId)->first();

        // Jika sudah ada, maka akan diupdate
        if ($univ) {
            $univ->update([
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            // Jika belum ada, maka akan dibuat baru
        } else {
            UniversityRegisterSnm::create([
                'univId' => $request->univId,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
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
