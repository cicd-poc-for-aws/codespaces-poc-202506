<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserMasterController extends Controller
{
    /**
     * 初期表示
     */
    public function index()
    {
        // Userテーブルのデータを取得
        $user_list = User::all();
        return view('userMaster', ['user_list'=>$user_list]);
    }

    /**
     * 新規登録・削除
     */
    public function insertDelete(Request $request)
    {
        // 登録するユーザデータ
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        // 削除するユーザデータ
        $delete_id = $request->input('delete_user');

        try {
            $user = new User();
            // *** INSERT ***
            if (isset($_POST['insert_user'])) {
                $user->insertIntoUsers($name, $email, $password);
            // *** DELETE ***
            } elseif (isset($_POST['delete_user'])) {
                $user->find($delete_id)->delete();
            }
        } catch (\Exception $e) {
            return redirect(route('userMaster'));
        }
        return redirect(route('userMaster'));
    }
}
