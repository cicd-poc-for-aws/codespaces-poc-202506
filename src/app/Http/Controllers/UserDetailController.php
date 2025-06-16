<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserDetailController extends Controller
{
    /**
     * 初期表示
     */
    public function index(Request $request)
    {
        // 選択情報受け取り
        $user_id = $request->input('detail');

        // 受け取ったユーザIDをもとにユーザ情報を1件取得する
        $user = new User();
        $user_detail = $user->selectUserFindById($user_id);

        return view('userDetail', compact('user_detail'));
    }
}
