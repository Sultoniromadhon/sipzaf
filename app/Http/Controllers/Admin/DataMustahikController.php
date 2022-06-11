<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\data_mustahik;
use Illuminate\Http\Request;


class DataMustahikController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $datamustahiks = data_mustahik::latest()->when(request()->q, function ($datamustahiks) {
            $datamustahiks = $datamustahiks->where('name', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.datamustahik.index', compact('datamustahiks'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('admin.datamustahik.create');
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'head_home' => 'required',
            'address' => 'required',
            'members_total' => 'required',
            'keterangan' => 'required',

        ]);


        //save to DB
        $datamustahik = data_mustahik::create([
        'head_home'=>$request->head_home,
        'address' => $request->address,
        'members_total'=>$request->members_total,
        'keterangan'=>$request->keterangan,

        ]);

        if ($datamustahik) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.datamustahik.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.datamustahik.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * edit
     *
     * @param  mixed $request
     * @param  mixed $datamustahiks
     * @return void
     */
    public function edit(data_mustahik $datamustahik)
    {
        return view('admin.datamustahik.edit', compact('datamustahik'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */
    public function update(Request $request, data_mustahik $datamustahik)
    {
        //  $this->validate($request, [
        //     'head_home'  => 'required|unique:datamustahiks,head_home,' . $datamustahik->id

        // ]);
        $this->validate($request, [

            'head_home' => 'required',
            'address' => 'required',
            'members_total' => 'required',
            'keterangan' => 'required',

        ]);



            //update data tanpa
            $datamustahik = data_mustahik::findOrFail($datamustahik->id);
            $datamustahik->update([
            'head_home' => $request->head_home,
            'address' => $request->address,
            'members_total' => $request->members_total,
            'keterangan' => $request->keterangan,
            ]);

            // //update dengan
            // $datamustahik = data$datamustahik::findOrFail($datamustahik->id);
            // $datamustahik->update([
            //     'name'   => $request->name,
            // ]);


        if ($datamustahik) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.datamustahik.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.datamustahik.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
    //--------------------------------------


    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $datamustahiks = data_mustahik::findOrFail($id);
        $datamustahiks->delete();

        if ($datamustahiks) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }



}
