@extends('layouts.app', ['title' => 'Edit Rumah Zakat - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">

        <div class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg text-gray-700 font-semibold capitalize">EDIT</h2>
            <hr class="mt-4">
            <form action="{{ route('admin.detailmustahik.update', $detailmustahik->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6 mt-4">

                    <div>
                        <label class="text-gray-700" for="head_name">KEPALA RUMAH</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="head_name"
                        value="{{ old('head_name', $detailmustahik->head_name) }}" placeholder="Nama">
                        @error('head_name')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror


                        <div>
                            <label class="text-gray-700" for="address">Pekerjaan</label>
                            <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="occupation"
                                value="{{ old('occupation', $detailmustahik->occupation) }}" placeholder="Pekerjaan">
                            @error('occupation')
                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                <div class="px-4 py-2">
                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                </div>
                            </div>
                            @enderror
                        </div>


                        <div>
                            <label class="text-gray-700" for="members_total">PEMILIK RUMAH</label>
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
                            <label class="text-gray-700" for="address">NO KEPENDUDUKAN</label>
                            <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="identity_number"
                            value="{{ old('identitiy_number', $detailmustahik->identity_number) }}" placeholder="Nomor Induk Pddk">
                            @error('identity_number')
                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                <div class="px-4 py-2">
                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                </div>
                            </div>
                            @enderror
                        </div>

                        <div>
                            <label class="text-gray-700" for="gender">Jenis Kelamin</label>
                            <select class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" name="gender">
                                <option class="py-1" value="{{ old('gender', $detailmustahik->gender) }}">Perempuan</option>
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
                </div>

                <div class="flex justify-start mt-4">
                    <button type="submit"
                        class="px-4 py-2 bg-gray-600 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">UPDATE</button>
                </div>

            </form>
        </div>

    </div>
</main>
@endsection
