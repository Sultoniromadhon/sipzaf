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
        Schema::create('detail_data_mustahiks', function (Blueprint $table) {
            $table->id();
            $table->string('head_name');
            $table->string('occupation');
            $table->unsignedInteger('data_mustahik_id');
            $table->string('identity_number');
            $table->string('gender');
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
        Schema::dropIfExists('detail_data_mustahiks');
    }
};
