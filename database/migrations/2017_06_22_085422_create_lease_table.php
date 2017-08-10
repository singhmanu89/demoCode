<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateLeaseTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('lease',function(Blueprint $table){
            $table->increments("id");
            $table->integer("property_id")->references("id")->on("property");
            $table->integer("leasetype_id")->references("id")->on("leasetype");
            $table->dateTime("startdatetime");
            $table->dateTime("enddatetime");
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
        Schema::drop('lease');
    }

}