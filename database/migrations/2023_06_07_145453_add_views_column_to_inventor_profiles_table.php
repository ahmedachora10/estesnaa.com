<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventor_profiles', function (Blueprint $table) {
            $table->bigInteger('views')->default(0)->after('whatsapp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventor_profiles', function (Blueprint $table) {
            $table->dropColumn('views');
        });
    }
};