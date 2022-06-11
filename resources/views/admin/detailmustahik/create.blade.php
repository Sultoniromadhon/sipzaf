@extends('layouts.app', ['title' => 'Data Rumah - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">

        <div class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg text-gray-700 font-semibold capitalize">+ Tambah Penerima</h2>
            <hr class="mt-4">
            <form action="{{ route('admin.detailmustahik.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-6 mt-4">

                    <div>
                        <label class="text-gray-700" for="head_name">KEPALA KELUARGA</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text"
                            name="head_name" value="{{ old('head_name') }}" placeholder="Nama">
                            @error('head_name')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="occupation">PEKERJAAN</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="occupation"
                            value="{{ old('occupation') }}" placeholder="Alamat">
                            @error('occupation')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="data_mustahik_id">PEMILIK RUMAH</label>
                        <select class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" name="data_mustahik_id">
                            @foreach($datamustahiks as $datamustahik)
                            <option class="py-1" value="{{ $datamustahik->id }}">{{ $datamustahik->head_home }}</option>
                            @endforeach
                        </select>
                        @error('data_mustahik_id')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="identity_number">NO KEPENDUDUKAN</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="identity_number"
                            value="{{ old('identity_number') }}" placeholder="No KTP">
                            @error('identity_number')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{$message}}</p>
                            </div>
                        </div>
                        @enderror
                    </div>


                <div>
                    <label class="text-gray-700" for="gender">JENIS KELAMIN</label>
                    <select class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" name="gender">
                        <option class="py-1" value="Laki-laki">Laki-laki</option>
                        <option class="py-1" value="Perempuan">Perempuan</option>
                    </select>
                    @error('gender')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>




                </div>

                <div class="flex justify-start mt-4">
                    <button type="submit"
                        class="px-4 py-2 bg-gray-600 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">SIMPAN</button>
                </div>
            </form>
        </div>

    </div>
</main>
@endsection
