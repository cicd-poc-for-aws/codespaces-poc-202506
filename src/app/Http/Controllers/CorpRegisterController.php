<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corp;
use Illuminate\Support\Facades\DB;

class CorpRegisterController extends Controller
{

    /**
     * 初期表示
     */
    public function form($corp_id = null)
    {
        $corp = DB::table('corp')->where('corp_id',$corp_id)->first();
        return view('corpRegister',compact('corp'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'corp_name' => 'required|string|max:60',
            'zip_code' => 'required|string|max:10',
            'prefecture' => 'required|string',
            'address1' => 'required|string|max:30',
            'address2' => 'nullable|string|max:30',
            'tel' => 'required|string|max:20',
            'memo' => 'nullable|string|max:2000'
        ]);

        Corp::create($request->all());

        return redirect()->route('corpList')->with('success','会社情報を登録しました。');
    }

    public function update(Request $request, $corp_id)
    {
        $request->validate([
            'corp_name' => 'required|string|max:60',
            'zip_code' => 'required|string|max:10',
            'prefecture' => 'required|string',
            'address1' => 'required|string|max:30',
            'address2' => 'nullable|string|max:30',
            'tel' => 'required|string|max:20',
            'memo' => 'nullable|string|max:2000'
        ]);

        $corp = DB::table('corp')->where('corp_id',$corp_id)
        ->update($request->only(['corp_name', 'zip_code','prefecture','address1','address2','tel','memo']));

        return redirect()->route('corpDetail', ['corp_id' => $corp_id])->with('success','会社情報を更新しました。');
    }
}
