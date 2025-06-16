<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Corp as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Corp extends Model
{
    use Notifiable;
    protected $table = 'corp';
    protected $primarykey = 'corp_id';
    public $incrementing = true ;
    protected $keytype = 'int';
    protected $fillable =[
        'corp_name', 'zip_code','prefecture','address1','address2','tel','memo'
    ];

    public function getRouteKeyName()
    {
        return 'corp_id';
    }

    /**
     * ユーザ全件を指定ページ区切りで取得する
     */
    public function selectAllCorps(int $page)
    {
        $query = $this->select([
            'corp_id',
            'corp_name',
            'tel'
        ]);

        return $query->paginate($page);
    }

    /**
     * 画面入力キーワードから検索結果を指定ページ区切りで取得する
     */
    public function selectCorpsByName(string $keyword, int $page)
    {
        $query = $this->select([
            'corp_id',
            'corp_name',
            'tel'
        ])->where([
            ['corp_name', 'like', '%'.$keyword.'%']
        ]);

        return $query->paginate($page);
    }

    /**
     * IDから一件のデータを取得する
     */
    public function selectCorpFindById($corp_id)
    {
        // 「SELECT id, name, email, created_at,updated_at WHERE id = ?」を発行する
        $query = $this->select([
            'corp_id',
            'corp_name',
            'tel',
            'created_at',
            'updated_at'
        ])->where([
            'corp_id' => $corp_id
        ]);
        // first()は1件のみ取得する関数
        return $query->first();
    }

}
