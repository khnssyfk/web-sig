<?php

namespace App\Http\Controllers;

use App\Models\MyTable;
use Illuminate\Http\Request;


class MyTableController extends Controller
{
    public function __construct()
    {
        $this->MyTable = new MyTable();
    }

    public function index()
    {
        return view('home');
    }

    public function titik()
    {
        $results = $this->MyTable->allData();
        return json_encode($results);
    }
    public function lokasi($id = "")
    {
        $results = $this->MyTable->getLokasi($id);
        return json_encode($results);
    }
}
