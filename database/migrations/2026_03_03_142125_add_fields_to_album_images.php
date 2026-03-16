<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToAlbumImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('album_images', function (Blueprint $table) {
            $table->dropForeign(['project_real_id']); // si existe
            $table->foreign('project_real_id')
                ->references('id')
                ->on('album_projects')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('album_images', function (Blueprint $table) {
            //
        });
    }
}
