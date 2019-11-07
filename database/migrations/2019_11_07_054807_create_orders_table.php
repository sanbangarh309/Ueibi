<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('orderno', 100);
            $table->string('company', 100);
            $table->string('area', 100);
            $table->string('city', 100);
            $table->text('address');
            $table->string('contact', 100);
            $table->string('email', 100);
            $table->string('industry', 100);
            $table->date('assigned_date');
            $table->tinyInteger('assigned');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
