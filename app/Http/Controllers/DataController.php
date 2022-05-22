<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\DataTables;

class DataController extends Controller
{
    public function index(){
        return view('data',[
            'datas'=> DB::table('mytable')->select('Title', 'alamat', 'gambar')->get()
        ]);
    }
    }

