<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippers', function (Blueprint $table) {
            $table->id();
            $table->string('ownername');
            $table->string('dba');
            $table->string('addressline1');
            $table->string('addressline2');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('licensenumber');
            $table->string('licensetype');
            $table->string('status');
            $table->date('effectivedate');
            $table->date('expirationdate');
            $table->string('lengthoflicense');
            $table->string('contactname');
            $table->string('emailaddress');
            $table->string('contactphone');
            $table->string('mailingaddressline1');
            $table->string('mailingaddresscity');
            $table->string('mailingaddressstate');
            $table->string('mailingaddresszip');
            $table->date('issuedate');
            $table->date('currentissuedate');
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
        Schema::dropIfExists('shippers');
    }
}
