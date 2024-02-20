<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function AllKecamatan(){
        $allKecamatan = Kecamatan::all();
        return view('components.kecamatan', compact('allKecamatan'));
    }

    public function AddKecamatan(){
        return view('kecamatan.add_kecamatan');
    }

    public function PostKecamatan(Request $req){
        $validatedData = $req->validate([
            'kode' => 'required|string|max:255',
            'nama_kecamatan' => 'required|string|max:255',
        ]);

        $isActive = $req->isActive !== null ? 1 : 0;

        Kecamatan::insert([
            'kode' => $validatedData['kode'],
            'nama_kecamatan' => $validatedData['nama_kecamatan'],
            'isActive' => $isActive,
        ]);

        $notification = array(
            'message' => 'Kecamatan berhasil ditambahkan!',
            'alert-type' => 'success',
        );
        return redirect()->route('all.kecamatan')->with($notification);
    }

    public function DeleteKecamatan($id){
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();

         $notification = [
            'message' => 'Kecamatan Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.kecamatan')
            ->with($notification);
    }

    public function EditKecamatan($id){
        $kecamatan = Kecamatan::findOrFail($id);
        return view('kecamatan.edit_kecamatan', compact('kecamatan'));
    }

     public function UpdateKecamatan(Request $req, $id){
        $kecamatan = Kecamatan::findOrFail($id);

        $validatedData = $req->validate([
            'kode' => 'required|string|max:255',
            'nama_kecamatan' => 'required|string|max:255',
        ]);

        $isActive = $req->isActive !== null ? 1 : 0;


        $kecamatan->update([
            'kode' => $validatedData['kode'],
            'nama_kecamatan' => $validatedData['nama_kecamatan'],
            'isActive' => $isActive,
        ]);

        return redirect()->route('all.kecamatan');
    }

}
