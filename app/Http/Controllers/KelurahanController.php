<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function AllKelurahan(){
        $allKelurahan = Kelurahan::all();
        return view('components.kelurahan', compact('allKelurahan'));
    }

     public function AddKelurahan(){
        $allKecamatan = Kecamatan::where('isActive',1)->get();
        return view('kelurahan.add_kelurahan', compact('allKecamatan'));
    }

    public function PostKelurahan(Request $req){
        $validatedData = $req->validate([
            'kode' => 'required|string|max:255',
            'nama_kelurahan' => 'required|string|max:255',
            'nama_kecamatan' => 'required|string|max:255'
        ]);


        $isActive = $req->isActive !== null ? 1 : 0;

        Kelurahan::insert([
            'kode' => $validatedData['kode'],
            'nama_kelurahan' => $validatedData['nama_kelurahan'],
            'nama_kecamatan' => $validatedData['nama_kecamatan'],
            'isActive' => $isActive,
        ]);

        $notification = array(
            'message' => 'Kelurahan berhasil ditambahkan!',
            'alert-type' => 'success',
        );
        return redirect()->route('all.kelurahan')->with($notification);
    }

    public function DeleteKelurahan($id){
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->delete();

         $notification = [
            'message' => 'Kelurahan Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.kelurahan')
            ->with($notification);
    }
    
    public function EditKelurahan($id){
        $kelurahan = Kelurahan::findOrFail($id);
        $allKecamatan = Kecamatan::where('isActive',1)->get();
        return view('kelurahan.edit_kelurahan', compact('kelurahan','allKecamatan'));
    }

     public function UpdateKelurahan(Request $req, $id){
        $kelurahan = Kelurahan::findOrFail($id);

         $validatedData = $req->validate([
            'kode' => 'required|string|max:255',
            'nama_kelurahan' => 'required|string|max:255',
            'nama_kecamatan' => 'required|string|max:255'
        ]);


        $isActive = $req->isActive !== null ? 1 : 0;

        $kelurahan->update([
            'kode' => $validatedData['kode'],
            'nama_kelurahan' => $validatedData['nama_kelurahan'],
            'nama_kecamatan' => $validatedData['nama_kecamatan'],
            'isActive' => $isActive,
        ]);

        $notification = array(
            'message' => 'Kelurahan berhasil ditambahkan!',
            'alert-type' => 'success',
        );
        return redirect()->route('all.kelurahan')->with($notification);
    }
}
