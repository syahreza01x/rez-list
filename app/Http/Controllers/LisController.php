<?php

namespace App\Http\Controllers;

use App\Helpers\EncryptionHelpers;
use App\Models\Lis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class LisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Lis::all()->where('id_user', Auth::user()->id);
        // return view('user.index', compact('data'));

        $userId = Auth::user()->id;
        $data = Lis::where('id_user', $userId)->get(); // Ubah 10 sesuai dengan jumlah data per halaman yang Anda inginkan

        return view('user.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'kode' => 'required',
        //     'judul' => 'required',
        //     'sinopsis' => 'required',
        //     'studio' => 'required',
        //     'genre' => 'required',
        //     'gambar' => 'required',
        //     'status' => 'required',
        // ]);

        // $image = $request->file('gambar');
        // $image->storeAs('public/gambarList', $image->hashName());

        // $genree = $request->genre;
        // $genre = implode(",", $genree);


        // Lis::create([
        //     'id_user' => Auth::user()->id,
        //     'kode' => $request->kode,
        //     'judul' => $request->judul,
        //     'sinopsis' => $request->sinopsis,
        //     'studio' => $request->studio,
        //     'genre' => $genre,
        //     'gambar' => $image->hashName(),
        //     'status' => $request->status,
        // ]);

        // return redirect()->route('user.index')
        //     ->with('success', 'List created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($user)
    {


        $id = EncryptionHelpers::decrypt($user);

        $user = Lis::find($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {
        $id = EncryptionHelpers::decrypt($user);
        $user = Lis::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $this->validate($request, [

            'status' => 'required',
        ]);

        $user = Lis::find($id);


        $user->update([
            'status' => $request->status,
        ]);

        return redirect()->route('user.index')
            ->with('success', 'List updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {





        $user = Lis::find($id);

        $user->delete();






        return redirect()->route('user.index')
            ->with('success', 'List deleted successfully');
    }
}
