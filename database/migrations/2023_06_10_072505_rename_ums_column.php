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
        Schema::table('who_votes_ums', function(Blueprint $table) {
            $table->renameColumn('ris_vote_id', 'ums_vote_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('who_votes_ums', function(Blueprint $table) {
            $table->renameColumn('ums_vote_id', 'ris_vote_id');
        });
    }
};
