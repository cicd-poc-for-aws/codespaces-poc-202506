<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corp;

class CorpListController extends Controller
{

    /**
     * 初期表示
     */
    public function index()
    {
        $keyword = '';      // 検索ボックス初期値
        $page = 10;         // ページ区切り件数

        // ユーザ情報を全件取得
        $corp = new Corp();
        $corps = $corp->selectAllCorps($page);

        return view('corpList', compact('corps'), compact('keyword'));
    }

    /**
     * 検索ボタン押下時
     */
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');      // 画面上の入力項目取得
        $page = 10;                                 // ページ区切り件数

        // キーワードが空白の場合は全件検索とする
        $corp = new Corp();
        if(!empty($keyword)){
            $corps = $corp->selectCorpsByName($keyword, $page);
        }else{
            $corps = $corp->selectAllCorps($page);
        }

        return view('corpList', compact('corps'), compact('keyword'));
    }
}
