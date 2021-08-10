<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollingUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polling_units', function (Blueprint $table) {
            $table->id();
            $table->integer('polling_unit_id');
            $table->integer('ward_id');
            $table->integer('lga_id');
            $table->foreignId('uniquewardid')->constrained('wards');
            $table->string('polling_unit_number');
            $table->string('polling_unit_name');
            $table->text('polling_unit_description');
            $table->string('lat');
            $table->string('long');
            $table->integer('entered_by_user')->nullable();
            $table->dateTime('date_entered')->nullable();
            $table->string('user_ip_address')->nullable();
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
        Schema::dropIfExists('polling_units');
    }
}
