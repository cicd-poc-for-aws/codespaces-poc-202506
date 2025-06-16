<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * ユーザ全件を指定ページ区切りで取得する
     */
    public function selectAllUsers(int $page)
    {
        $query = $this->select([
            'id',
            'name',
            'email'
        ]);

        return $query->paginate($page);
    }

    /**
     * 画面入力キーワードから検索結果を指定ページ区切りで取得する
     */
    public function selectUsersByName(string $keyword, int $page)
    {
        $query = $this->select([
            'id',
            'name',
            'email'
        ])->where([
            ['name', 'like', '%'.$keyword.'%']
        ]);

        return $query->paginate($page);
    }

    /**
     * レコードを新規登録する
     */
    public function insertIntoUsers($name, $email, $password) {
        $this::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>Hash::make($password),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * IDから一件のデータを取得する
     */
    public function selectUserFindById($id)
    {
        // 「SELECT id, name, email, created_at,updated_at WHERE id = ?」を発行する
        $query = $this->select([
            'id',
            'name',
            'email',
            'created_at',
            'updated_at'
        ])->where([
            'id' => $id
        ]);
        // first()は1件のみ取得する関数
        return $query->first();
    }

    /**
     * レコードを更新する
     */
    public function updateUsers($u_id, $name, $email) {
        $this::where('id', $u_id)->update([
            'name'=>$name,
            'email'=>$email,
        ]);
    }
}
