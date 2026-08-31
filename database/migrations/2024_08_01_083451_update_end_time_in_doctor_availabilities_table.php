<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEndTimeInDoctorAvailabilitiesTable extends Migration
{
    public function up()
    {
        Schema::table('doctor_availabilities', function (Blueprint $table) {
            $table->time('end_time')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('doctor_availabilities', function (Blueprint $table) {
            $table->time('end_time')->nullable(false)->change();
        });
    }
}
?>