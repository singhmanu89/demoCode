<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateSecurityDepositTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('securitydeposit',function(Blueprint $table){
            $table->increments("id");
            $table->integer("property_id")->references("id")->on("property");
            $table->integer("security_id")->references("id")->on("security");
            $table->string("amount")->nullable();
            $table->dateTime("dueOn");
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
        Schema::drop('securitydeposit');
    }

}