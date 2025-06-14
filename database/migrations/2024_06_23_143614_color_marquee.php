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
        Schema::table('marqueetexts', function (Blueprint $table) {
            $table->string('color', 7)->default('#000000'); // Add default color
        });
    }

    public function down()
    {
        Schema::table('marqueetexts', function (Blueprint $table) {
            $table->dropColumn('color');
        });
    }

};
