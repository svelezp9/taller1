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

        Schema::create('reviews', function (Blueprint $table) {

            $table->id();

            $table->text('comment');

            $table->integer('rating');

            $table->unsignedBigInteger('mobile_id');

            $table->foreign('mobile_id')->references('id')->on('mobiles');

        });
    }

    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::dropIfExists('reviews');
    }
};
