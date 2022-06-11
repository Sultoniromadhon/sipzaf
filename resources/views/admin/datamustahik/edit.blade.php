@extends('layouts.app', ['title' => 'Edit Data Rumah - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">

        <div class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg text-gray-700 font-semibold capitalize">EDIT</h2>
            <hr class="mt-4">
            <form action="{{ route('admin.datamustahik.update', $datamustahik->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6 mt-4">

                    <div>
                        <label class="text-gray-700" for="name">KEPALA RUMAH</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text"name="head_home"
                        value="{{ old('head_home', $datamustahik->head_home) }}" placeholder="Nama">
                        @error('head_home')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror


                        <div>
                            <label class="text-gray-700" for="address">ALAMAT</label>
                            <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="address"
                                value="{{ old('address', $datamustahik->address) }}" placeholder="Alamat">
                            @error('address')
                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                <div class="px-4 py-2">
                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                </div>
                            </div>
                            @enderror
                        </div>
                        <div>
                            <label class="text-gray-700" for="members_total">TOTAL ANGGOTA</label>
                            <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="members_total"
                                value="{{ old('members_total', $datamustahik->members_total) }}" placeholder="Total anggota">
                            @error('members_total')
                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                <div class="px-4 py-2">
                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                </div>
                            </div>
                            @enderror
                        </div>
                        <div>
                            <label class="text-gray-700" for="address">KETERANGAN</label>
                            <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="keterangan"
                            value="{{ old('keterangan', $datamustahik->keterangan) }}" placeholder="Keterangan">
                            @error('keterangan')
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
