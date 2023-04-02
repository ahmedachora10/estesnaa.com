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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('country_id')->nullable()->after('avatar');
            $table->string('role')->nullable()->after('avatar');
            $table->string('country_code')->nullable()->after('avatar');
            $table->date('dob')->nullable()->after('avatar');
            $table->string('address')->nullable()->after('avatar');
            $table->string('city')->nullable()->after('avatar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn('country_id');
            $table->dropColumn('role');
            $table->dropColumn('country_code');
            $table->dropColumn('dob');
            $table->dropColumn('address');
            $table->dropColumn('city');
        });
    }
};