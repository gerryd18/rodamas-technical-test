@extends('layouts.app')
@section('content')
 <div class="container flex items-center px-4 bg-slate-200 h-15 text-xl py-5">
    Data Pegawai : 
 </div>

 <a href="{{route('add.pegawai')}}">
   <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-2 my-4">
    Tambah
  </button>
 </a>


 <div class="overflow-x-auto">
  <table class="table-auto min-w-full border-collapse border border-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-4 py-2">No</th>
        <th class="px-4 py-2">Nama Pegawai</th>
        <th class="px-4 py-2">Tempat lahir</th>
        <th class="px-4 py-2">Tgl. Lahir</th>
        <th class="px-4 py-2">Jenis Kelamin</th>
        <th class="px-4 py-2">Agama</th>
        <th class="px-4 py-2">Alamat</th>
        <th class="px-4 py-2">Kelurahan</th>
        <th class="px-4 py-2">Kecamatan</th>
        <th class="px-4 py-2">Provinsi</th>
        <th class="px-4 py-2">Action</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">


      @foreach ($allPegawai as $key => $item)
          <tr>
            <td class="px-4 py-2 text-center">{{$key + 1}}</td>
            <td class="px-4 py-2 text-center">{{$item->nama}}</td>
            <td class="px-4 py-2 text-center">{{$item->tempat_lahir}}</td>
            <td class="px-4 py-2 text-center">{{$item->tanggal_lahir}}</td>
            <td class="px-4 py-2 text-center">{{$item->jenis_kelamin}}</td>
            <td class="px-4 py-2 text-center">{{$item->agama}}</td>
            <td class="px-4 py-2 text-center">{{$item->alamat}}</td>
            <td class="px-4 py-2 text-center">{{$item->kelurahan}}</td>
            <td class="px-4 py-2 text-center">{{$item->kecamatan}}</td>
            <td class="px-4 py-2 text-center">{{$item->provinsi}}</td>
            
             <td class="px-4 py-2 text-center">
              <a href="{{route('edit.pegawai',$item->id)}}">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
              </a>
              <a href="{{route('delete.pegawai',$item->id)}}">
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
              </a>
            </td>
        </tr>
      @endforeach
      <!-- Add more rows as needed -->
    </tbody>
  </table>
</div>

 @endsection
