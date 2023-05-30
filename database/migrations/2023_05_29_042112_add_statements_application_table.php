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
        Schema::table('applications', function($table) {
            $table->integer('anti_plagiarism_statement_id')->nullable();
            $table->integer('ris_statement_id')->nullable();
            $table->integer('ums_statement_id')->nullable();
            $table->integer('publish_statement_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function($table) {
            $table->dropColumn('anti_plagiarism_statement_id');
            $table->dropColumn('ris_statement_id');
            $table->dropColumn('ums_statement_id');
            $table->dropColumn('publish_statement_id');
        });
    }
};
