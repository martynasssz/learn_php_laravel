<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserToBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            //$table->unsignedInteger('user_id')->nullable(); //all existing records in user_id tale set as null
            
            if (env('DB_CONNECTION') === 'sqlite_testing') { //for test running without errors
                $table->unsignedBigInteger('user_id')->default(0);
            } else {
                $table->unsignedBigInteger('user_id');
            }            
            
            $table->foreign('user_id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');            
        });
    }
}
