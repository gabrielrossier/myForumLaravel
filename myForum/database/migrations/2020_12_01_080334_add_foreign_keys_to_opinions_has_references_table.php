<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOpinionsHasReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opinions_has_references', function (Blueprint $table) {
            $table->foreign('opinion_id', 'fk_references_has_opinions_opinions1')->references('id')->on('opinions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('reference_id', 'fk_references_has_opinions_references1')->references('id')->on('references')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opinions_has_references', function (Blueprint $table) {
            $table->dropForeign('fk_references_has_opinions_opinions1');
            $table->dropForeign('fk_references_has_opinions_references1');
        });
    }
}
