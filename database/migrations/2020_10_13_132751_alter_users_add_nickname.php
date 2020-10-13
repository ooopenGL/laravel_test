<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersAddNickname extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nickname', 100)->after('name')->nullable()->comment('用户昵称');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // down是up的逆操作，执行php artisan migrate 的时候调用的是每个类migration的up方法，php artisan migrate:rollback的时候则是down方法
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nickname');
        });
    }
}
