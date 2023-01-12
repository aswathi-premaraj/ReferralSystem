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
            if (!Schema::hasColumn('users', 'referral_code')) {
                $table->text('referral_code')->after('email')->nullable();
            }
            if (!Schema::hasColumn('users', 'referral_id')) {
            $table->bigInteger('referral_id')->after('email')->nullable();
            }
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
            if (Schema::hasColumn('users', 'referral_code')) {
                $table->dropColumn('referral_code');
            }
            if (Schema::hasColumn('users', 'referral_id')) {
                $table->dropColumn('referral_id');
            }
        });
    }
};
