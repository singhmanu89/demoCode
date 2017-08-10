<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateRecurringRentTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('recurringrent',function(Blueprint $table){
            $table->increments("id");
            $table->integer("property_id")->references("id")->on("property");
            $table->string("rentamount")->nullable();
            $table->date("monthduedate")->nullable();
            $table->date("FirstpaymentDate")->nullable();
            $table->string("proratedamount")->nullable();
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
        Schema::drop('recurringrent');
    }

}