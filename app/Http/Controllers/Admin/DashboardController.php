<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\data_mustahik;
use App\Models\detail_data_mustahik;


class DashboardController extends Controller
{
    public function index()
    {

        // user admin
         $theuser = User::count();

        //data mustahik
        $datamustahik = data_mustahik::count();


        //data detail mustahik
        $detaildatamustahik = detail_data_mustahik::count();

        return view('admin.dashboard.index', compact('theuser','datamustahik', 'detaildatamustahik'));
        // return view('admin.campaign.edit', compact('campaign', 'categories'));
    }


}
