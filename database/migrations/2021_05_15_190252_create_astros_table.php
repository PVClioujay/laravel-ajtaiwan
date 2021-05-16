<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAstrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('astros', function (Blueprint $table) {
            $table->id();
            // 星座名稱
            $table->string('Name');
            // 當天日期
            $table->string('Date');
            // 整體運勢
            $table->string('fortuneAll');
            $table->string('fortuneAllNum');
            // 愛情運勢
            $table->string('fortuneLove');
            $table->string('fortuneLoveNum');
            // 財運運勢
            $table->string('fortuneMoney');
            $table->string('fortuneMoneyNum');
            // 事業運勢
            $table->string('fortuneBussWork');
            $table->string('fortuneBussWorkNum');

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
        Schema::dropIfExists('astros');
    }
}
