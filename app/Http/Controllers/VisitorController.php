<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VisitorController extends Controller
{
    public function create()
    {
        // only load the 10 most recent visitors for the form sidebar
        $visitors = Visitor::latest()->take(10)->get();

        return view('visitor.form', compact('visitors'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:100',
            'nim_nip' => 'nullable|string|max:50',
            'department' => 'required|string|max:100',
            'tingkat' => 'required|in:mahasiswa/i,dosen/pegawai',
            'keperluan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Visitor::create([
            'nama' => $request->nama,
            'nim_nip' => $request->nim_nip,
            'department' => $request->department,
            'tingkat' => $request->tingkat,
            'keperluan' => $request->keperluan,
        ]);

        return redirect()->route('visitor.form')->with('success', 'Data pengunjung berhasil disimpan!');
    }
}
