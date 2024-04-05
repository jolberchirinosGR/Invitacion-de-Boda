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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->boolean('confirm')->default(0)->nullable();
            $table->string('phone')->nullable();

            $table->time('arrival')->nullable();

            $table->unsignedBigInteger('id_responsable')->nullable();
            $table->foreign('id_responsable')->references('id')->on('users');

            $table->unsignedBigInteger('id_role')->nullable()->default(2);
            $table->foreign('id_role')->references('id')->on('roles');

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
        Schema::dropIfExists('users');
    }
};
