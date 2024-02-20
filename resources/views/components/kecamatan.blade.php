@extends('layouts.app')
@section('content')
 <div class="container flex items-center px-4 bg-slate-200 h-15 text-xl py-5">
    Data Kecamatan : 
 </div>

 <a href="{{route('add.kecamatan')}}">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-2 my-4">
    Tambah
  </button>
 </a>


 <div class="overflow-x-auto">
  <table class="table-auto min-w-full border-collapse border border-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-4 py-2">No</th>
        <th class="px-4 py-2">Kode</th>
        <th class="px-4 py-2">Nama Kecamatan</th>
        <th class="px-4 py-2">Active</th>
        <th class="px-4 py-2">Action</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">

      @foreach ($allKecamatan as $key => $item)
          <tr>
            <td class="px-4 py-2 text-center">{{$key + 1}}</td>
            <td class="px-4 py-2 text-center">{{$item->kode}}</td>
            <td class="px-4 py-2 text-center">{{$item->nama_kecamatan}}</td>
            <td class="px-4 py-2 text-center">
                 @if($item->isActive == 1)
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" checked disabled>
                @elseif($item->isActive == 0)
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" disabled>
                @endif
            </td>
            <td class="px-4 py-2 text-center">
            <a href="{{route('edit.kecamatan',$item->id)}}">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
              </a>
              <a href="{{route('delete.kecamatan',$item->id)}}">
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
