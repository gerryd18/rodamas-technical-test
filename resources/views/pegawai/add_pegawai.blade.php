@extends('layouts.app')
@section('content')
     <div class="container flex items-center px-4 bg-slate-200 h-15 text-xl py-5 mb-10">
        Tambah Pegawai 
    </div>

    <div class="container flex items-center justify-center">
        <div class="w-1/2 p-5 rounded-xl bg-blue-200">
            <form class="w-full max-w-lg mx-auto" action="{{ route('post.pegawai') }}" method="POST">
                @csrf

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nama_pegawai">
                            Nama Pegawai
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nama_pegawai" name="nama_pegawai" type="text" placeholder="Nama Pegawai">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="tempat_lahir">
                            Tempat Lahir
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="tempat_lahir" name="tempat_lahir" type="text" placeholder="Tempat Lahir">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="tanggal_lahir">
                            Tanggal Lahir
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="tanggal_lahir" name="tanggal_lahir" type="date">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="jenis_kelamin">
                            Jenis kelamin
                        </label>
                        <select class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="">Choose :</option>
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="agama">
                            Agama
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="agama" name="agama" type="text" placeholder="Agama">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="alamat">
                            Alamat
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="alamat" name="alamat" type="text" placeholder="Alamat">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nama_kelurahan">
                            Kelurahan
                        </label>
                        <select class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nama_kelurahan" name="nama_kelurahan">
                            <option value="">Choose :</option>
                            @foreach ($allKelurahan as $item)
                                <option value="{{$item->nama_kelurahan}}">{{$item->nama_kelurahan}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nama_kecamatan">
                            Kecamatan
                        </label>
                        <select class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nama_kecamatan" name="nama_kecamatan">
                            <option value="">Choose :</option>
                            @foreach ($allKecamatan as $item)
                                <option value="{{$item->nama_kecamatan}}">{{$item->nama_kecamatan}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nama_provinsi">
                            Provinsi
                        </label>
                        <select class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nama_provinsi" name="nama_provinsi">
                            <option value="">Choose :</option>
                            @foreach ($allProvinsi as $item)
                                <option value="{{$item->nama_provinsi}}">{{$item->nama_provinsi}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Submit</button>
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