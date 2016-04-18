<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokensAndUsersTables extends Migration {

    public function up()
    {
        Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->string('photo')->nullable();

            $table->index('email');

            $table->timestamps();
        });

        Schema::create('tokens', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('key');
            $table->string('status');

            $table->index('user_id');
            $table->index('key');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('users');
        Schema::drop('tokens');
    }

}
