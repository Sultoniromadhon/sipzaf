<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    //

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        // $role=User::latest();
        $users = User::latest()->when(request()->q, function ($users) {
            $users = $users->where('name', 'like', '%' . request()->q . '%');
        })->paginate(10);

        // if ($role=='Admin'){

        return view('admin.user.index', compact('users'));

        // }
        // if($role == 'Pengaju'){

        //     return redirect()->view('admin.user.pengaju', compact('users'));
        // }

    }


    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('admin.user.create');
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        // $this->validate($request, [

        //     'name'  => 'required|unique:users'
        // ]);

        $this->validate($request, [

            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'address'=> 'required',
            'gender'=> 'required',
            'occupation'=> 'required',

        ]);


        //save to DB
        $user = User::create([

            'name'   => $request->name,
            'email'   => $request->email,
            'password'   => Hash::make($request->password),
            'address'   => $request->address,
            'gender'   => $request->gender,
            'occupation'   => $request->occupation,
        ]);

        if ($user) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.user.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.user.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * edit
     *
     * @param  mixed $request
     * @param  mixed $users
     * @return void
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required',
            'address' => 'required',
            'occupation' => 'required',

        ]);



            //update data tanpa
            $user = User::findOrFail($user->id);
            $user->update([
                'name'   => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'occupation' => $request->occupation,
            ]);

            // //update dengan
            // $user = User::findOrFail($user->id);
            // $user->update([
            //     'name'   => $request->name,
            // ]);


        if ($user) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.user.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.user.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $users = User::findOrFail($id);
        $users->delete();

        if ($users) {
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
