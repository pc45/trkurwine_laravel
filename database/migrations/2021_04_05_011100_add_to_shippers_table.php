<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToShippersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Shippers', function (Blueprint $table) {
            $table->integer('parent_shipper_id')->nullable();
            $table->string('parent_shipper_name')->nullable();
            $table->enum('processed', array('0','1'))->default('0');
            $table->string('primary_number')->nullable();
            $table->string('street_name')->nullable();
            $table->string('street_predirection')->nullable();
            $table->string('street_postdirection')->nullable();
            $table->string('street_suffix')->nullable();
            $table->string('secondary_number')->nullable();
            $table->string('secondary_designator')->nullable();
            $table->string('city_name')->nullable();
            $table->string('default_city_name')->nullable();
            $table->string('state_abbreviation')->nullable();
            $table->string('ss_zipcode')->nullable();
            $table->string('plus4_code')->nullable();
            $table->string('delivery_point')->nullable();
            $table->string('delivery_point_check_digit')->nullable();
            $table->string('record_type')->nullable();
            $table->string('rdi')->nullable();
            $table->mediumText('smartystreet_response')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Shippers', function (Blueprint $table) {
            //
        });
    }
}
