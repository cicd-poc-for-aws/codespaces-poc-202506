<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MenuController extends Controller
{
    /**
     * 初期表示
     */
    public function index()
    {
        $keyword = '';      // 検索ボックス初期値
        $page = 10;         // ページ区切り件数

        // ユーザ情報を全件取得
        $user = new User();
        $users = $user->selectAllUsers($page);

        return view('menu', compact('users'), compact('keyword'));
    }

    /**
     * 検索ボタン押下時
     */
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');      // 画面上の入力項目取得
        $page = 10;                                 // ページ区切り件数

        // キーワードが空白の場合は全件検索とする
        $user = new User();
        if(!empty($keyword)){
            $users = $user->selectUsersByName($keyword, $page);
        }else{
            $users = $user->selectAllUsers($page);
        }

        return view('menu', compact('users'), compact('keyword'));
    }
}
