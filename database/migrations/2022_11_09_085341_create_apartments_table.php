<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->string('type');
            $table->string('appendix')->default(0);
            $table->string('code');
            $table->integer('room_count');
            $table->integer('area');
            $table->longText('about')->nullable();
            $table->integer('price')->nullable();
            $table->integer('price_bank')->nullable();
            $table->text('details');
            $table->string('img');
            $table->longText('virtual_location')->nullable();
            // $table->text('reservation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
