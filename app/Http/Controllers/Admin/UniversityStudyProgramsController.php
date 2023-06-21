<?php

namespace App\Http\Controllers\Admin;

use App\Models\UniversityStudyPrograms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UniversityFaculty;
use Illuminate\Support\Str;

class UniversityStudyProgramsController extends Controller
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
    public function create($facultyId)
    {
        // Ambil data faculty berdasarkan id
        $faculty = UniversityFaculty::findOrFail($facultyId);

        return view('backend.pages.university-study-programs.create', [
            'faculties' => $faculty
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create data
        $data = UniversityStudyPrograms::create([
            'faculty_id' => $request->faculty_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('university-faculties.show', $request->faculty_id)->with('success', 'Program studi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UniversityStudyPrograms  $universityStudyPrograms
     * @return \Illuminate\Http\Response
     */
    public function show(UniversityStudyPrograms $universityStudyPrograms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UniversityStudyPrograms  $universityStudyPrograms
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get data
        $data = UniversityStudyPrograms::findOrFail($id);

        return view('backend.pages.university-study-programs.edit', [
            'studyProgram' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UniversityStudyPrograms  $universityStudyPrograms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  Update data
        $data = UniversityStudyPrograms::findOrFail($id);

        $data->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('university-faculties.show', $data->faculty_id)->with('success', 'Program studi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UniversityStudyPrograms  $universityStudyPrograms
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete data
        $data = UniversityStudyPrograms::findOrFail($id);

        $data->delete();

        return redirect()->route('university-faculties.show', $data->faculty_id)->with('success', 'Program studi berhasil dihapus');
    }
}
