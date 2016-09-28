<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('post_id');
            $table->string('post_name')->unique();
            $table->text('post_title');
            $table->string('post_type');
            $table->longtext('post_content');
            $table->string('post_slug');
            $table->boolean('post_status');
            $table->datetime('post_datetime');
            $table->string('post_author');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('post');
    }

}
