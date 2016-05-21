<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations. Create 'People' table.
     *
     * @return void
     */
    public function up() {

        Schema::create('people', function (Blueprint $table) {

            // Table columns.
            $table->increments('id');
            $table->string('fName', 50);
            $table->string('mName', 50);
            $table->string('lName', 50);
            $table->date('DoB');
            $table->date('DoD');
            $table->string('birthCity', 100);
            $table->string('birthCountry', 100);
            $table->string('arrivalCity', 100);
            $table->string('arrivalCountry', 100);
            $table->date('arrivalDate');
            $table->string('profession', 100);
            $table->text('notes');

            // Foreign keys.
            $table->foreign('birthCountry')->references('name')->on('countries')->onUpdate('cascade');
            $table->foreign('arrivalCountry')->references('name')->on('countries')->onUpdate('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() { Schema::drop('people'); }

}
