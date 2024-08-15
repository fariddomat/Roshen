<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->date('date_of_build');
            $table->text('address');
            $table->text('address_location')->nullable();
            $table->longText('virtual_location')->nullable();
            $table->string('scheme_name');
            $table->integer('floors_count');
            // $table->integer('floor_apartments_count');
            // $table->integer('apartments_count')->default(0);
            // $table->integer('appendix_count')->default(0);
            $table->text('details')->nullable();
            $table->string('img');
            $table->string('cover_img')->nullable();
            $table->string('status')->default('مكتمل');
            $table->integer('status_percent')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->integer('sort_id')->default(1);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
