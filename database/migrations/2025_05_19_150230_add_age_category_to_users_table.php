<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgeCategoryToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
$table->string('age_category')->nullable()->after('email');
            // Bisa juga nullable() jika mau
            // $table->string('age_category')->nullable()->after('email');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('age_category');
        });
    }
}
