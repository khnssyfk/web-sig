<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyTable extends Model
{
    public function allData()
    {
        $results = DB::table('mytable')
            ->select('Title', 'Latitude', 'Longitude')->get();
        return $results;
    }

    public function getLokasi($id = '')
    {
        $results = DB::table('mytable')
            ->select('Title', 'alamat', 'gambar')->where('id', $id)->get();
        return $results;
    }
}
