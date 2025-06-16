<?php

return[

    /*
    |--------------------------------------------------------------------------
    | カスタムラベル
    |--------------------------------------------------------------------------
    |
    | 画面上に表示するラベル名を定義します。
    | 下記に項目を追加する場合、「画面名」=> 「カテゴリ名」の順に定義してください。
    | 値の取り出し方は以下の通りです。
    |
    | 例）'app_blade' => [
    |        'Login' => 'ログイン'
    |     ]
    |
    | Blade側）{{ __(labels.app_blade.Login) }}
    |
    */

    'app_blade' => [
        'Toggle navigation' => 'ToggleNavigation',
        'Login' => 'ログイン',
        'Register' => 'ユーザ登録',
        'Logout' => 'ログアウト'
    ],
    'login' => [
        'AppName' => '開発キット',
        'Login' => 'ログイン',
        'E-Mail Address' => 'メールアドレス',
        'Password' => 'パスワード',
        'Remember Me' => 'ログイン情報を保存する',
        'Forgot Your Password?' => 'パスワードを忘れてしまったら'
    ],
    'menu' => [
        'NoResultsFound' => '該当するレコードはありません'
    ],
    'userMaster' => [
        'Title' => 'ユーザマスタ'
    ],
    'userEdit' => [
        'Title' => 'ユーザ情報編集'
    ],
];
