<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\detail_data_mustahik;
use Illuminate\Http\Request;
use App\Models\data_mustahik;
use Illuminate\Support\Facades\Storage;

class DetailMustahikController extends Controller
{
    //

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $detailmustahiks = detail_data_mustahik::latest()->when(request()->q, function ($detailmustahiks) {
            $detailmustahiks = $detailmustahiks->where('name', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.detailmustahik.index', compact('detailmustahiks'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $datamustahiks = data_mustahik::latest()->get();
        return view('admin.detailmustahik.create',compact('datamustahiks'));
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

            'head_name'=>'required',
            'occupation'=>'required',
            'data_mustahik_id'=>'required',
            'identity_number'=>'required',
            'gender'=>'required',

        ]);


        //save to DB
        $detailmustahik = detail_data_mustahik::create([

            'head_name' => $request->head_name,
            'occupation' => $request->occupation,
            'data_mustahik_id' => $request->data_mustahik_id,
            'identity_number' => $request->identity_number,
            'gender' => $request->gender,

        ]);

        if ($detailmustahik) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.detailmustahik.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.detailmustahik.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * edit
     *
     * @param  mixed $request
     * @param  mixed $detailmustahiks
     * @return void
     */
    public function edit(detail_data_mustahik $detailmustahik)
    {
        $datamustahiks = data_mustahik::latest()->get();
        return view('admin.detailmustahik.edit', compact('detailmustahik','datamustahiks'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */
    public function update(Request $request, detail_data_mustahik $detailmustahik)
    {
        //  $this->validate($request, [
        //     'head_home'  => 'required|unique:detailmustahiks,head_home,' . $detailmustahik->id

        // ]);

        $this->validate($request, [

            'head_name' => 'required',
            'occupation' => 'required',
            'data_mustahik_id' => 'required',
            'identity_number' => 'required',

        ]);



        //update data tanpa
        $detailmustahik = detail_data_mustahik::findOrFail($detailmustahik->id);
        $detailmustahik->update([
            'head_name' => $request->head_name,
            'occupation' => $request->occupation,
            'data_mustahik_id' => $request->data_mustahik_id,
            'identity_number' => $request->identity_number,
            'gender' => $request->gender,
        ]);

            // //update dengan
            // $datamustahik = data$datamustahik::findOrFail($datamustahik->id);
            // $datamustahik->update([
            //     'name'   => $request->name,
            // ]);
        if ($detailmustahik) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.detailmustahik.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.detailmustahik.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $detailmustahiks = detail_data_mustahik::findOrFail($id);
        $detailmustahiks->delete();

        if ($detailmustahiks) {
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
