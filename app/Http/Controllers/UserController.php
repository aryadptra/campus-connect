<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $data = User::where('id', Auth::user()->id)->first();

        return view('frontend.user.index', [
            'user' => $data
        ]);
    }

    // Update
    public function update(Request $request)
    {
        $id = Auth::user()->id;

        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $data = User::where('id', $id)->first();

        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address
        ]);

        return redirect()->route('user')->with('success', 'Data berhasil diupdate');
    }
}
