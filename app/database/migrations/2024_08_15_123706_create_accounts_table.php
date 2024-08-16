<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account');
            $table->string('mail');
            $table->string('password');
            $table->string('remember_token');
            $table->string('name')->nullable();
            $table->integer('tel')->nullable();
            $table->integer('post')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('user_role')->default(0);
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
        Schema::dropIfExists('accounts');
    }
}
