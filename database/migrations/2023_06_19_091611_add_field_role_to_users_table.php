<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldRoleToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->after('password');
            $table->string('status')->default('active')->after('role');
            $table->string('phone')->nullable()->after('status');
            $table->string('address')->nullable()->after('phone');
            $table->string('avatar')->default('default.png')->after('address');
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
            // drop
            $table->dropColumn('role');
            $table->dropColumn('status');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('avatar');
        });
    }
}