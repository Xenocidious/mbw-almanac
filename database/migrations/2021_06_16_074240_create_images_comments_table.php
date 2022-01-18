<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('image_id');
            $table->string('user_name');
            $table->integer('user_id');
            $table->text('comment');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->boolean('edited');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images_commments');
    }
}
