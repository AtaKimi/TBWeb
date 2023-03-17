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
        Schema::create('book_identity_pivots', function (Blueprint $table) {
            $table->foreignUuid('book_uuid')->constrained('books', 'uuid')->onDelete('cascade');
            $table->foreignId('book_identity_id')->constrained('book_identities')->onDelete('cascade');
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
        Schema::dropIfExists('book_identity_pivots');
    }
};
