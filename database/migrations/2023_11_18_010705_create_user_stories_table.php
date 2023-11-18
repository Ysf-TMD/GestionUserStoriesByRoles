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
        Schema::create('user_stories', function (Blueprint $table) {
            $table->id();
            $table->string("nomUserStorie");
            $table->text('Description');
            $table->unsignedBigInteger('id_utilisateur');
            $table->foreign("id_utilisateur")->references("id")->on('profiles')->onDelete('cascade')->onUpdate("cascade") ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_stories');

    }
};
