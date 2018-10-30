<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('company_number');
            $table->string('last_name');
            $table->string('telephone');
            $table->string('address');
            $table->string('post_code');
            $table->string('logo')->nullable();
            $table->string('slogan')->nullable();
            $table->integer('rating')->nullable();
            $table->string('website')->nullable();
            $table->string('vat')->nullable();
            $table->string('cart')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
