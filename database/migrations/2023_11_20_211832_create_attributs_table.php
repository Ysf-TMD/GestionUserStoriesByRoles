<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attributs', function (Blueprint $table) {
            $table->id();
            $table->string("nomAttribut");
            $table->string("type");
            $table->unsignedBigInteger("id_table");
            $table->foreign("id_table")->references("id")->on("tables")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributs');
    }
};
