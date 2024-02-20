<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pegawai;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function AllPegawai(){
        $allPegawai = Pegawai::all();
        #
        return view('components.pegawai', compact('allPegawai'));
    }

    public function AddPegawai(){
        $allKecamatan = Kecamatan::where('isActive',1)->get();
        $allProvinsi = Provinsi::where('isActive',1)->get();
        $allKelurahan = Kelurahan::where('isActive',1)->get();
        return view('pegawai.add_pegawai', compact('allKecamatan','allKelurahan','allProvinsi'));
    }


    public function PostPegawai(Request $req){
        // dd($req);
        $validatedData = $req->validate([
            'nama_pegawai' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nama_kelurahan' => 'required|string|max:255',
            'nama_kecamatan' => 'required|string|max:255',
            'nama_provinsi' => 'required|string|max:255',
        ]);


        Pegawai::insert([
            'nama' => $validatedData['nama_pegawai'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'agama' => $validatedData['agama'],
            'alamat' => $validatedData['alamat'],
            'kelurahan' => $validatedData['nama_kelurahan'],
            'kecamatan' => $validatedData['nama_kecamatan'],
            'provinsi' => $validatedData['nama_provinsi'],
        ]);

         return redirect()->route('all.pegawai');
    }

    public function DeletePegawai($id){
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

         $notification = [
            'message' => 'Pegawai Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.pegawai')
            ->with($notification);
    }

    public function EditPegawai($id){
        $pegawai = Pegawai::findOrFail($id);
        $allKecamatan = Kecamatan::where('isActive',1)->get();
        $allProvinsi = Provinsi::where('isActive',1)->get();
        $allKelurahan = Kelurahan::where('isActive',1)->get();

        return view('pegawai.edit_pegawai', compact('allKecamatan','allKelurahan','allProvinsi','pegawai'));
    }


    public function UpdatePegawai(Request $req, $id){
        $pegawai = Pegawai::findOrFail($id);

        // dd($req);
        $validatedData = $req->validate([
            'nama_pegawai' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nama_kelurahan' => 'required|string|max:255',
            'nama_kecamatan' => 'required|string|max:255',
            'nama_provinsi' => 'required|string|max:255',
        ]);


        $pegawai->update([
            'nama' => $validatedData['nama_pegawai'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'agama' => $validatedData['agama'],
            'alamat' => $validatedData['alamat'],
            'kelurahan' => $validatedData['nama_kelurahan'],
            'kecamatan' => $validatedData['nama_kecamatan'],
            'provinsi' => $validatedData['nama_provinsi'],
        ]);

         return redirect()->route('all.pegawai');
    }
}
