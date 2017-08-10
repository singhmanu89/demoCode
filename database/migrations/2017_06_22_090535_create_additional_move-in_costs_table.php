<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateAdditionalMoveInCostsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('additionalmoveincosts',function(Blueprint $table){
            $table->increments("id");
            $table->integer("property_id")->references("id")->on("property")->nullable();
            $table->string("memo")->nullable();
            $table->string("amount")->nullable();
            $table->string("dueon")->nullable();
            $table->integer("securitydeposit_id")->references("id")->on("securitydeposit");
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
        Schema::drop('additionalmoveincosts');
    }

}