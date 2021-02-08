<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslateRequestMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translate_request_members', function (Blueprint $table) {
            $table->id();
            $table->integer('translate_request_id')->unsigned();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index(['translate_request_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('translate_request_members');
    }
}
