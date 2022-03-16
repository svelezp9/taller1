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

        Schema::create('mobiles', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->float('price');

            $table->string('brand');

            $table->string('model');

            $table->string('color');

            $table->integer('ramMemory');

            $table->integer('storage');

            $table->string('imgName');

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

        Schema::dropIfExists('mobiles');
    }
};


