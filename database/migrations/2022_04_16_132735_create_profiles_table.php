<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration//Profilesとする。
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {//profilesと複数形
            $table->bigIncrements('id');
            $table->string('name'); //名前
            $table->string('gender');  //性別
            $table->string('hobby'); // 趣味
            $table->string('introduction');  // 自己紹介
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');//複数形にする
    }
}
