<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('birthday');
            $table->string('allergies')->nullable();
            $table->string('pollen')->nullable();
            $table->string('hobby')->nullable();
            $table->dropColumn('email_verified_at');
            $table->dropColumn('email');
            $table->dropColumn('remember_token');
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
            //
            $table->dropColumn('birthday');
            $table->dropColumn('allergies');
            $table->dropColumn('pollen');
            $table->dropColumn('hobby');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email');
            $table->string('remember_token')->nullable();
        });
    }
}
