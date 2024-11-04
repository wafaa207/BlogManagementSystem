<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('post_visits', function (Blueprint $table) {
            $table->dropColumn('visitor_ip');
            $table->unsignedInteger('visitors')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_visits', function (Blueprint $table) {
            $table->string('visitor_ip')->after('post_id');
            $table->dropColumn('visitors');
        });
    }
};
