<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;


class ProvinsiController extends Controller
{
    public function AllProvinsi(){
        $allProvinsi = Provinsi::all();
        return view('components.provinsi', compact('allProvinsi'));
    }

    public function AddProvinsi(){
        return view('provinsi.add_provinsi');
    }

    public function PostProvinsi(Request $req){
        $validatedData = $req->validate([
            'kode' => 'required|string|max:255',
            'nama_provinsi' => 'required|string|max:255',
        ]);

        $isActive = $req->isActive !== null ? 1 : 0;

        Provinsi::insert([
            'kode' => $validatedData['kode'],
            'nama_provinsi' => $validatedData['nama_provinsi'],
            'isActive' => $isActive,
        ]);

        $notification = array(
            'message' => 'Provinsi berhasil ditambahkan!',
            'alert-type' => 'success',
        );
        return redirect()->route('all.provinsi')->with($notification);
    }

    public function DeleteProvinsi($id){
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();

         $notification = [
            'message' => 'Provinsi Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.provinsi')
            ->with($notification);
    }

    public function EditProvinsi($id){
        $provinsi = Provinsi::findOrFail($id);
        return view('provinsi.edit_provinsi', compact('provinsi'));
    }

    public function UpdateProvinsi(Request $req, $id){
        $provinsi = Provinsi::findOrFail($id);

        $validatedData = $req->validate([
            'kode' => 'required|string|max:255',
            'nama_provinsi' => 'required|string|max:255',
        ]);

        $isActive = $req->isActive !== null ? 1 : 0;


        $provinsi->update([
            'kode' => $validatedData['kode'],
            'nama_provinsi' => $validatedData['nama_provinsi'],
            'isActive' => $isActive,
        ]);

        return redirect()->route('all.provinsi');
    }

    
}
