<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserEditController extends Controller
{
    /**
     * 初期表示
     */
    public function index(Request $request)
    {
        // 編集対象ID情報受け取り
        $user_id = $request->input('update_user');

        // 受け取ったユーザIDをもとにユーザ情報を1件取得する
        $user = new User();
        $user_detail = $user->selectUserFindById($user_id);

        return view('userEdit', compact('user_detail'));
    }

    /**
     * 更新処理
     */
    public function update(Request $request)
    {
        // 更新するユーザーデータ
        $id = $request->input('update_user');
        $name = $request->input('name');
        $email = $request->input('email');

        try {
            $user = new User();
            // *** UPDATE ***
            $user->updateUsers($id, $name, $email);
        } catch (\Exception $e) {
            return redirect(route('userEdit'));
        }
        return redirect(route('userMaster'));
    }
}
