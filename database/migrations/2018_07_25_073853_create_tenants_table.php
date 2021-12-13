<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vacancy_id');
            $table->string('name');
            $table->string('address');
            $table->string('telephone');
            $table->string('sex');
            $table->string('religion');
            $table->string('country');
            $table->string('state');
            $table->string('town');
            $table->string('gname');
            $table->string('relationship');
            $table->string('gaddress');
            $table->string('gtelephone');
            $table->string('duration');
            $table->double('amount');
            $table->string('amountpaid');
            $table->string('balance');
            $table->string('paymentstatus');
            $table->string('rentstatus');
            $table->string('expires');
            $table->string('admin');
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
        Schema::dropIfExists('tenants');
    }
}
