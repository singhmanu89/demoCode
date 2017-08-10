<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateListingTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('listing',function(Blueprint $table){
            $table->increments("id");
            $table->integer("property_id")->references("id")->on("property")->nullable();
            $table->integer("propertytype_id")->references("id")->on("propertytype")->nullable();
            $table->string("bedrooms")->nullable();
            $table->string("full_bathroom")->nullable();
            $table->string("half_bathroom")->nullable();
            $table->string("sq_footage")->nullable();
            $table->string("headline")->nullable();
            $table->string("description")->nullable();
            $table->integer("petpolicy_id")->references("id")->on("petpolicy")->nullable();
            $table->integer("featuresamenities_id")->references("id")->on("featuresamenities")->nullable();
            $table->string("any_other_amenities")->nullable();
            $table->string("month_rent")->nullable();
            $table->string("security_rent")->nullable();
            $table->string("in_month_duration")->nullable();
            $table->string("when_avaliable")->nullable();
            $table->string("move_in_date")->nullable();
            $table->string("video_link")->nullable();
            $table->string("screening_credit")->nullable();
            $table->string("background_check")->nullable();
            $table->string("short_link")->nullable();
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
        Schema::drop('listing');
    }

}