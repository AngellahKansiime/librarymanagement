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
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borrowers_id'); // student ID
            $table->unsignedBigInteger('book_id');
            $table->string('name');
            $table->date('date_taken');
            $table->date('expected_return');
            $table->string('issued_by');
            $table->enum('status', ['pending', 'borrowed', 'returned', 'rejected'])->default('pending');
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('borrowers');
    }
};
