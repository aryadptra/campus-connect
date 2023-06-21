<?php

namespace App\Http\Controllers\Admin;

use App\Models\UniversityBlog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Support\Str;

class UniversityBlogController extends Controller
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
        $data = University::where('id', $univId)->first();

        return view('backend.pages.university-blog.create', [
            'university' => $data
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
        $validate =  $request->validate([
            'university_id' => 'required',
            'title' => 'required',
            'isi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Jika ada file gambar yang diupload
        if ($request->hasFile('image')) {
            // Mengambil file yang diupload
            $file = $request->file('image');
            // Mengambil nama file
            $fileName = $file->getClientOriginalName();
            // Menyimpan gambar ke folder public/img
            $file->storeAs('public/backend/images/universities/blog/', $fileName);
        }

        // Menyimpan data ke dalam table university_blogs
        $universityBlog = new UniversityBlog();

        $universityBlog->university_id = $request->university_id;
        $universityBlog->title = $request->title;
        $universityBlog->slug = Str::slug($request->title);
        $universityBlog->isi = $request->isi;
        $universityBlog->image = $fileName;

        $universityBlog->save();

        return redirect()->route('universities.show', $request->university_id)->with('success', 'Blog berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UniversityBlog  $universityBlog
     * @return \Illuminate\Http\Response
     */
    public function show(UniversityBlog $universityBlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UniversityBlog  $universityBlog
     * @return \Illuminate\Http\Response
     */
    public function edit(UniversityBlog $universityBlog)
    {
        $data = UniversityBlog::findOrFail($universityBlog->id);


        return view('backend.pages.university-blog.edit', [
            'blog' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UniversityBlog  $universityBlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UniversityBlog $universityBlog)
    {
        $validate =  $request->validate([
            'title' => 'required',
            'isi' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Jika ada file gambar yang diupload
        if ($request->hasFile('image')) {

            // Menghapus file yang lama
            unlink(storage_path('app/public/backend/images/universities/blog/' . $universityBlog->image));

            // Mengambil file yang diupload
            $file = $request->file('image');
            // Mengambil nama file
            $fileName = $file->getClientOriginalName();
            // Menyimpan gambar ke folder public/img
            $file->storeAs('public/backend/images/universities/blog/', $fileName);


            // Menyimpan data ke dalam table university_blogs
            $universityBlog->title = $request->title;
            $universityBlog->slug = Str::slug($request->title);
            $universityBlog->isi = $request->isi;
            $universityBlog->image = $fileName;

            $universityBlog->update();
        } else {
            // Menyimpan data ke dalam table university_blogs
            $universityBlog->title = $request->title;
            $universityBlog->slug = Str::slug($request->title);
            $universityBlog->isi = $request->isi;

            $universityBlog->update();
        }

        return redirect()->route('universities.show', $universityBlog->university_id)->with('success', 'Blog berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UniversityBlog  $universityBlog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $universityBlog = UniversityBlog::findOrFail($id);

        // Hapus
        unlink(storage_path('app/public/backend/images/universities/blog/' . $universityBlog->image));

        $universityBlog->delete();

        return redirect()->route('universities.show', $universityBlog->university_id)->with('success', 'Blog berhasil dihapus');
    }
}
