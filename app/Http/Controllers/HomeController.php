<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
    }


    public function index()
    {
        return view('home.index', ['title' => 'Home', 'profile' => Profile::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.create', ['title' => 'Tambah Data']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'alamat_ktp' => 'required',
            'pekerjaan' => 'required',
            'nama_lengkap' => 'required',
            'pendidikan_terakhir' => 'required',
            'nomor_telpon' => 'required'

        ]);

        $validateData['user_id'] = auth()->user()->id;


        Profile::create($validateData);
        return redirect('/')->with('success', 'Tambah data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('home.show', ['title' => 'Detail Profile', 'profile' => Profile::Where('id', $id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('home.edit', ['title' => 'Edit Profile', 'profile' => Profile::Where('id', $id)->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {

        $validateData = $request->validate([
            'alamat_ktp' => 'required',
            'pekerjaan' => 'required',
            'nama_lengkap' => 'required',
            'pendidikan_terakhir' => 'required',
            'nomor_telpon' => 'required'

        ]);

        $validateData['user_id'] = $request->user_id;


        Profile::where('id', $request->id)->update($validateData);
        return redirect('/')->with('success', 'Edit data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Profile::destroy($request->id);
        return redirect('/')->with('success', 'Hapus data Berhasil');
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $user = User::all();
        foreach ($user as $a) {


            if ($a->username == $keyword || $a->email == $keyword ||  $a->name == $keyword) {
                $users = Profile::where('user_id', 'like', "%" . $a->id . "%")->get();
            } else {
                $users = Profile::where('pekerjaan', 'like', "%" . $keyword . "%")->orWhere('pendidikan_terakhir', 'like', "%" . $keyword . "%")->orWhere('alamat_ktp', 'like', "%" . $keyword . "%")->orWhere('nomor_telpon', 'like', "%" . $keyword . "%")->orWhere('nama_lengkap', 'like', "%" . $keyword . "%")->get();
            }
        }
        return view('home.index', ['title' => 'Home', 'profile' => $users]);
    }
}
