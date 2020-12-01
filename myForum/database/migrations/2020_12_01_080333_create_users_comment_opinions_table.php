<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersCommentOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_comment_opinions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->index('fk_users_has_opinions_users1_idx');
            $table->integer('opinion_id')->index('fk_users_has_opinions_opinions1_idx');
            $table->string('comment', 5000);
            $table->integer('points')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_comment_opinions');
    }
}
