@extends('layouts.app')
@section('content')
     <div class="container flex items-center px-4 bg-slate-200 h-15 text-xl py-5 mb-10">
        Edit Provinsi 
    </div>

    <div class="container flex items-center justify-center">
        <div class="w-1/2 p-5 rounded-xl bg-blue-200">
            <form class="w-full max-w-lg mx-auto" action="{{route('update.provinsi', $provinsi->id)}}" method="POST">
                @csrf

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="kode">
                        Kode
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="kode" name="kode" type="text" placeholder="Kode" value="{{$provinsi->kode}}">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nama_provinsi">
                        Nama Provinsi
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nama_provinsi" name="nama_provinsi" type="text" placeholder="Nama Provinsi" value="{{$provinsi->nama_provinsi}}">
                    </div>
                </div>
                <div class="flex items-center mb-6">
                    <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                         @if($provinsi->isActive == 1)
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="isActive" checked>
                        @elseif($provinsi->isActive == 0)
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="isActive" >
                        @endif
                        <span class="text-sm">
                            Is Active
                        </span>
                    </label>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" value="Update" />
                </div>
            </form>
        </div>
    </div>

     <script>
        document.getElementById('isActive').addEventListener('change', function() {
            this.value = this.checked ? 1 : 0;
        });
    </script>
    
@endsection