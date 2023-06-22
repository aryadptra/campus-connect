<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\UniversityBlog;
use App\Models\UniversityFaculty;
use App\Models\UniversityFavorites;
use App\Models\UniversityRegisterMandiri;
use App\Models\UniversityRegisterSbm;
use App\Models\UniversityRegisterSnm;
use App\Models\UniversityStudyPrograms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Cek apakah ada query string
        if (request()->query('q')) {
            $q = request()->query('q');

            $data = University::where('name', 'LIKE', '%' . $q . '%')->paginate(10);
        } else {
            // Paginate data
            $data = University::paginate(10);
        }

        return view('frontend.index', [
            'universities' => $data
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get data
        $data = University::findOrFail($id);

        $faculties = UniversityFaculty::where('university_id', $id)->get();

        // Get data university faculty
        $dataFaculty = $data->faculties()->paginate(10);

        $studyProgram = UniversityStudyPrograms::where('faculty_id', $id)->get();

        $univId = $data->id;

        $univSnm = UniversityRegisterSnm::where('university_id', $id)->get();

        // Jika $univSnm tidak ada
        if (!$univSnm) {
            $univSnm = null;
        }

        $univSbm = UniversityRegisterSbm::where('university_id', $id)->get();

        // Jika $univSbm tidak ada
        if (!$univSbm) {
            $univSbm = null;
        }

        $univMandiri = UniversityRegisterMandiri::where('university_id', $id)->get();

        // Jika $univMandiri tidak ada
        if (!$univMandiri) {
            $univMandiri = null;
        }

        $blog = UniversityBlog::where('university_id', $id)->get();

        $favorite = UniversityFavorites::where('university_id', $id)->where('user_id', Auth::user()->id)->get();

        return view('frontend.detail', [
            'university' => $data,
            'faculties' => $faculties,
            'faculty' => $dataFaculty,
            'studyProgram' => $studyProgram,
            'univSnm' => $univSnm,
            'univSbm' => $univSbm,
            'univMandiri' => $univMandiri,
            'blog' => $blog,
            'favorite' => $favorite,
            'univId' => $univId
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit(University $university)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, University $university)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        //
    }

    public function all()
    {
        // Cek apakah ada query string
        // Paginate data
        $data = University::paginate(10);


        return view('frontend.all', [
            'universities' => $data
        ]);
    }

    public function addFavorite($id)
    {
        // Get user
        $user = Auth::user();

        // Cek apakah ada user dengan id tersebut di tabel favorite
        $cek = UniversityFavorites::where('user_id', $user->id)->where('university_id', $id)->first();

        // Jika ada
        if ($cek) {
            return redirect()->back()->with('error', 'Universitas sudah ada di favorit');
        } else {
            UniversityFavorites::create([
                'user_id' => $user->id,
                'university_id' => $id
            ]);

            return redirect()->back()->with('success', 'Universitas berhasil ditambahkan ke favorit');
        }

        return redirect()->back()->with('error', 'Terjadi kesalahan');
    }

    public function removeFavorite($id)
    {
        // Get user
        $user = Auth::user();

        // Cek apakah ada user dengan id tersebut di tabel favorite
        $cek = UniversityFavorites::where('user_id', $user->id)->where('university_id', $id)->first();

        // Jika ada
        if ($cek) {
            $cek->delete();

            return redirect()->back()->with('success', 'Universitas berhasil dihapus dari favorit');
        } else {
            return redirect()->back()->with('error', 'Universitas tidak ada di favorit');
        }

        return redirect()->back()->with('error', 'Terjadi kesalahan');
    }
}
