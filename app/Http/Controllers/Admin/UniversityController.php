<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\UniversityBlog;
use App\Models\UniversityFaculty;
use App\Models\UniversityRegisterMandiri;
use App\Models\UniversityRegisterSbm;
use App\Models\UniversityRegisterSnm;
use App\Models\UniversityStudyPrograms;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = University::all();

        // Paginate data
        $data = University::paginate(10);


        return view('backend.pages.university.index', [
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
        return view('backend.pages.university.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $validate = $request->validate([
            'name' => 'required|unique:universities,name',
            'description' => 'required',
            'address' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:universities,email',
            'website' => 'required',
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        // Jika ada file logo yang diupload 
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/universities', $filename);
            $data['logo'] = $filename;

            University::create([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => Str::slug($request->name),
                'village' => $request->village,
                'district' => $request->district,
                'city' => $request->city,
                'province' => $request->province,
                'address' => $request->address,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'website' => $request->website,
                'logo' => $filename,
                'status' => 'active'
            ]);
        }


        return redirect()->route('universities.index')->with('success', 'Data universitas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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

        return view('backend.pages.university.show', [
            'university' => $data,
            'faculties' => $faculties,
            'faculty' => $dataFaculty,
            'studyProgram' => $studyProgram,
            'univSnm' => $univSnm,
            'univSbm' => $univSbm,
            'univMandiri' => $univMandiri,
            'blog' => $blog,
            'univId' => $univId
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get data
        $data = University::findOrFail($id);

        return view('backend.pages.university.edit', [
            'university' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate
        $validate = $request->validate([
            'name' => 'required|unique:universities,name,' . $id,
            'description' => 'required',
            'address' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:universities,email,' . $id,
            'website' => 'required',
            'logo' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        // Get data
        $data = University::findOrFail($id);

        // Jika ada file logo yang diupload
        if ($request->hasFile('logo')) {
            // Delete logo
            unlink(public_path('storage/images/universities/' . $data->logo));

            // Upload logo
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/universities', $filename);
            $data['logo'] = $filename;
        }

        // Update data
        $data->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
            'village' => $request->village,
            'district' => $request->district,
            'city' => $request->city,
            'province' => $request->province,
            'address' => $request->address,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'website' => $request->website,
            'status' => $request->status
        ]);

        return redirect()->route('universities.index')->with('success', 'Data universitas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete data
        $data = University::findOrFail($id);

        // Delete logo
        $logo = $data->logo;

        // Delete data
        $data->delete();

        // Delete logo
        unlink(public_path('storage/images/universities/' . $logo));

        return redirect()->route('universities.index')->with('success', 'Data universitas berhasil dihapus');
    }
}
