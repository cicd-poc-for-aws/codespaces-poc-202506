<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corp', function (Blueprint $table) {
            $table->increments('corp_id')->comment('会社ID');
            $table->string('corp_name', 60)->comment('会社名')->default('');
            $table->string('zip_code', 10)->comment('郵便番号')->nullable()->default('');
            $table->string('prefecture')->comment('都道府県')->nullable()->default('');
            $table->string('address1', 30)->comment('住所1（市区郡～番地）')->default('');
            $table->string('address2', 30)->comment('住所2（建物名）')->nullable()->default('');
            $table->string('tel', 20)->comment('電話番号')->nullable()->default('');
            $table->string('memo', 2000)->comment('備考')->nullable()->default('');
            $table->tinyInteger('contract_status_nid')->comment('契約ステータスID')->default(0);
            $table->dateTime('created_at')->comment('作成日時')->nullable();
            $table->dateTime('updated_at')->comment('更新日時')->nullable();
            $table->tinyInteger('is_deleted')->comment('論理削除フラグ')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corp');
    }
}
