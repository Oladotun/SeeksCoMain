<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemHourCloseDayOfWeekToItemHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_hours', function (Blueprint $table) {
            $table->integer('item_hour_close_day_of_week');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_hours', function (Blueprint $table) {
            $table->dropColumn('item_hour_close_day_of_week');
        });
    }
}
