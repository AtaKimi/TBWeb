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
        Schema::create('books', function (Blueprint $table) {
            $table->foreignUuid('uuid')->constrained('isbns', 'uuid')->onDelete('cascade');
            $table->string('title');
            $table->string('writer');
            $table->longText('summary');
            $table->integer('price');
            $table->string('photo');
            $table->foreignId('book_kind_id')->constrained('book_kinds')->onDelete('cascade');
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
        Schema::dropIfExists('books');
    }
};
