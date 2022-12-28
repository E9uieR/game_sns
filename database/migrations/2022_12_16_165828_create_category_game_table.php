<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_game', function (Blueprint $table) {
            $table->unsignedBigInteger('categoire_id');
            $table->unsignedBigInteger('game_id');
            // 複合主キーを定義
            $table->primary(['categoire_id','game_id']);
            // 指定したカラムに外部キー制約を定義
            $table->foreign('categoire_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_game');
    }
};
