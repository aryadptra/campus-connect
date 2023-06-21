<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\UniversityFaculty;
use App\Models\UniversityStudyPrograms;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class UniversityFacultyController extends Controller
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
    public function create($univId)
    {
        $university = University::findOrFail($univId);

        return view('backend.pages.university-faculties.create', compact('university'));
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
        $data = UniversityFaculty::create([
            'university_id' => $request->university_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('universities.show', $request->university_id)->with('success', 'Fakultas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UniversityFaculty  $universityFaculty
     * @return \Illuminate\Http\Response
     */
    public function show(UniversityFaculty $universityFaculty)
    {
        $facultyId = $universityFaculty->id;

        $studyProgram = UniversityStudyPrograms::where('faculty_id', $facultyId)->get();

        return view('backend.pages.university-faculties.show', [
            'studyProgram' => $studyProgram,
            'facultyId' => $facultyId,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UniversityFaculty  $universityFaculty
     * @return \Illuminate\Http\Response
     */
    public function edit(UniversityFaculty $universityFaculty)
    {
        $data = UniversityFaculty::findOrFail($universityFaculty->id);

        return view('backend.pages.university-faculties.edit', [
            'faculty' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UniversityFaculty  $universityFaculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UniversityFaculty $universityFaculty)
    {
        UniversityFaculty::where('id', $universityFaculty->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('universities.show', $universityFaculty->university_id)->with('success', 'Fakultas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UniversityFaculty  $universityFaculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(UniversityFaculty $universityFaculty)
    {
        // Delete data
        $universityFaculty->delete();

        return redirect()->route('universities.show', $universityFaculty->university_id)->with('success', 'Fakultas berhasil dihapus');
    }
}
