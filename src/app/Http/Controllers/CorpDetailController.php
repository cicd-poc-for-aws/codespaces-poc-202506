<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corp;
use Illuminate\Support\Facades\DB;

class CorpDetailController extends Controller
{
    /**
     * 初期表示
     */
    public function index($corp_id)
    {
        $corp = DB::table('corp')->where('corp_id',$corp_id)->first();
        return view('corpDetail',compact('corp'));
    }

}
