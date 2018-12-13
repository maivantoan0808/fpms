<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });

        Schema::table('project_meta', function (Blueprint $table) {
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');
        });

        Schema::table('project_user', function (Blueprint $table) {
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('position_id')
                ->references('id')
                ->on('positions')
                ->onDelete('cascade');
        });

        Schema::table('document_versions', function (Blueprint $table) {
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->foreign('document_version_id')
                ->references('id')
                ->on('document_versions')
                ->onDelete('cascade');
        });

        Schema::table('sprints', function (Blueprint $table) {
            $table->foreign('release_plan_id')
                ->references('id')
                ->on('release_plans')
                ->onDelete('cascade');
        });

        Schema::table('meetings', function (Blueprint $table) {
            $table->foreign('sprint_id')
                ->references('id')
                ->on('sprints')
                ->onDelete('cascade');
            $table->foreign('meeting_type_id')
                ->references('id')
                ->on('meeting_types')
                ->onDelete('cascade');
        });

        Schema::table('meeting_meta', function (Blueprint $table) {
            $table->foreign('meeting_id')
                ->references('id')
                ->on('meetings')
                ->onDelete('cascade');
        });

        Schema::table('reports', function (Blueprint $table) {
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('relationships');
    }
}
