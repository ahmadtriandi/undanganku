<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::orderBy('name_guest')->get();
        return view('guest.index', compact('guests'));
    }

    public function create()
    {
        return view('guest.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'email'         => 'required|email',
            'phone'         => 'required',
            'address'       => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Guest::create([
            "name_guest"            => $request->name,
            "information_guest"     => $request->information,
            "email_guest"           => $request->email,
            "phone_guest"           => $request->phone,
            "address_guest"         => $request->address,
        ]);


        return redirect('/guest')->with('success', "Berhasil menambah data");
    }

    public function edit($id)
    {
        $guest = Guest::where('id_guest', $id)->first();
        return view('guest.edit', compact('guest'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'email'         => 'required|email',
            'phone'         => 'required',
            'address'       => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Guest::where('id_guest', $id)->update([
            "name_guest"            => $request->name,
            "information_guest"     => $request->information,
            "email_guest"           => $request->email,
            "phone_guest"           => $request->phone,
            "address_guest"         => $request->address,
        ]);

        return redirect('/guest')->with('success', "Berhasil mengedit data");
    }


    public function delete(Request $request)
    {
        Guest::where('id_guest', $request->id_guest)->delete();
        return redirect('guest')->with('success', "Berhasil menghapus data");
    }
}
