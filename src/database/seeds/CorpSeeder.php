<?php

use Illuminate\Database\Seeder;

class CorpSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // データのクリア
        DB::table('corp')->truncate();
        //データの作成
        DB::table('corp')->insert([
            [
            'corp_id' => 1,
            'corp_name' => 'テスト会社1',
            'zip_code' => '1088288',
            'prefecture' => '東京都',
            'address1' => '港区港南',
            'address2' => '二丁目16番2号 太陽生命ビル26階',
            'tel' => '0367182771',
            'memo' => 'テストメモテストメモテストメモテストメモ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'is_deleted' => 0,
            ],
            [
                'corp_id' => 2,
                'corp_name' => 'テスト会社2',
                'zip_code' => '1088288',
                'prefecture' => '東京都',
                'address1' => '港区港南',
                'address2' => '二丁目16番2号 太陽生命ビル26階',
                'tel' => '0367182771',
                'memo' => 'テストメモ2テストメモ2テストメモ2テストメモ2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'is_deleted' => 0,
                ],
            [
                'corp_id' => 3,
                'corp_name' => 'テスト会社3',
                'zip_code' => '1088288',
                'prefecture' => '東京都',
                'address1' => '港区港南',
                'address2' => '二丁目16番2号 太陽生命ビル26階',
                'tel' => '0367182771',
                'memo' => 'テストメモ3テストメモ3テストメモ3テストメモ3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'is_deleted' => 0,
                ]
        ]);
    }
}
